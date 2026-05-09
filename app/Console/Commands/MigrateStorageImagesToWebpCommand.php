<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class MigrateStorageImagesToWebpCommand extends Command
{
    protected $signature = 'images:migrate-storage-to-webp
                            {--quality=85 : WebP quality 0-100}';

    protected $description = 'Перекодировать существующие изображения в storage (public/images) в WebP и обновить поле image';

    public function __construct(
        private readonly ImageManager $imageManager,
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $quality = max(0, min(100, (int) $this->option('quality')));

        $images = Image::query()
            ->whereNotNull('image')
            ->get();

        $converted = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($images as $row) {
            $path = $row->image;
            if (! is_string($path) || $path === '') {
                $skipped++;
                continue;
            }
            if (str_ends_with(strtolower($path), '.webp')) {
                $skipped++;
                continue;
            }
            if (! Storage::exists($path)) {
                $this->warn("Нет файла: {$path} (id {$row->id})");
                $failed++;
                continue;
            }

            try {
                $absolute = Storage::path($path);
                $newName = pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $dir = \dirname($path);
                $newPath = ($dir === '.' || $dir === '') ? 'public/images/' . $newName : $dir . '/' . $newName;

                if ($newPath === $path) {
                    $skipped++;
                    continue;
                }

                DB::transaction(function () use ($row, $absolute, $newPath, $path, $quality): void {
                    $out = Storage::path($newPath);
                    File::ensureDirectoryExists(\dirname($out));
                    $image = $this->imageManager->read($absolute);
                    $image->toWebp($quality)->save($out);
                    $row->update(['image' => $newPath]);
                    Storage::delete($path);
                });
                $converted++;
            } catch (\Throwable $e) {
                Log::error('images:migrate-storage-to-webp: ' . $e->getMessage(), [
                    'image_id' => $row->id,
                    'path' => $path,
                ]);
                $this->error("Ошибка id={$row->id}: " . $e->getMessage());
                $failed++;
            }
        }

        $this->info("Готово: перекодировано {$converted}, пропущено {$skipped}, ошибок {$failed}.");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }
}
