<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ConvertAviDveriStaticImagesToWebpCommand extends Command
{
    protected $signature = 'images:convert-public-to-webp
                            {--remove-original : Удалить jpg/png после успешной конвертации}
                            {--update-refs : Обновить пути /avi-dveri_assets/... в resources/views}
                            {--dry-run : Только показать, без записи}
                            {--quality=85 : WebP quality 0-100}';

    protected $description = 'Конвертировать public/avi-dveri_assets (растровые) в WebP, опционально правки в шаблонах';

    public function __construct(
        private readonly ImageManager $imageManager,
        private readonly Filesystem $filesystem,
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $quality = max(0, min(100, (int) $this->option('quality')));
        $dry = (bool) $this->option('dry-run');
        $removeOriginal = (bool) $this->option('remove-original');
        $updateRefs = (bool) $this->option('update-refs');

        $base = public_path('avi-dveri_assets');
        if (! is_dir($base)) {
            $this->error("Нет каталога: {$base}");

            return self::FAILURE;
        }

        $replacements = [];
        $converted = 0;
        $failed = 0;
        $skipped = 0;

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($base, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        /** @var \SplFileInfo $fileInfo */
        foreach ($iterator as $fileInfo) {
            if (! $fileInfo->isFile()) {
                continue;
            }

            $ext = strtolower($fileInfo->getExtension());
            if (! in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
                $skipped++;
                continue;
            }

            $sourcePath = $fileInfo->getPathname();
            $targetPath = $fileInfo->getPath() . DIRECTORY_SEPARATOR . $fileInfo->getBasename('.' . $fileInfo->getExtension()) . '.webp';

            $oldWeb = $this->toPublicUrl($sourcePath);
            $newWeb = $this->toPublicUrl($targetPath);

            if (file_exists($targetPath) && $targetPath !== $sourcePath) {
                $this->line("Уже есть WebP, пропуск конвертации: {$targetPath}");
                if ($updateRefs) {
                    $replacements[$oldWeb] = $newWeb;
                }
                $skipped++;
                continue;
            }

            if ($dry) {
                $this->line("[dry-run] {$sourcePath} => {$targetPath}");
                if ($updateRefs) {
                    $replacements[$oldWeb] = $newWeb;
                }
                $converted++;
                continue;
            }

            try {
                $image = $this->imageManager->read($sourcePath);
                File::ensureDirectoryExists($fileInfo->getPath());
                $image->toWebp($quality)->save($targetPath);
                $replacements[$oldWeb] = $newWeb;
                if ($removeOriginal) {
                    @unlink($sourcePath);
                }
                $converted++;
                $this->line("OK: {$oldWeb} -> {$newWeb}");
            } catch (\Throwable $e) {
                $this->warn("Ошибка {$sourcePath}: " . $e->getMessage());
                $failed++;
            }
        }

        if (! $dry && $updateRefs && $replacements !== []) {
            $this->updateViewReferences($replacements);
        }

        if ($dry && $updateRefs) {
            $this->info('[dry-run] --update-refs: будет заменено ' . count($replacements) . ' уникальных путей.');
        }

        $this->info("Сконвертировано/показано: {$converted}, пропущено: {$skipped}, ошибок: {$failed}.");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    /**
     * @param  array<string, string>  $replacements
     */
    private function updateViewReferences(array $replacements): void
    {
        if ($replacements === []) {
            return;
        }

        $viewFiles = $this->filesystem->allFiles(resource_path('views'));
        $n = 0;
        foreach ($viewFiles as $viewFile) {
            $path = $viewFile->getPathname();
            if (! str_ends_with($path, '.php')) {
                continue;
            }
            $contents = $this->filesystem->get($path);
            $new = str_replace(array_keys($replacements), array_values($replacements), $contents);
            if ($new !== $contents) {
                $this->filesystem->put($path, $new);
                $n++;
            }
        }
        $this->info("Обновлено файлов шаблонов: {$n}.");
    }

    private function toPublicUrl(string $absolutePath): string
    {
        $public = rtrim(public_path(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $rel = Str::after($absolutePath, $public);
        $rel = str_replace('\\', '/', $rel);

        return '/' . ltrim($rel, '/');
    }
}
