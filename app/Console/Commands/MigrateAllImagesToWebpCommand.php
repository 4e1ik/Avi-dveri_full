<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateAllImagesToWebpCommand extends Command
{
    protected $signature = 'images:migrate-all-to-webp
                            {--quality=85 : WebP quality 0-100}
                            {--dry-run : Только показать, без записи}
                            {--remove-original : Удалить jpg/png после конвертации статики}
                            {--no-update-refs : Не обновлять пути в resources/views}
                            {--skip-products : Пропустить изображения товаров (storage + БД)}
                            {--skip-static : Пропустить статику public/avi-dveri_assets}';

    protected $description = 'Конвертировать все изображения в WebP: товары (storage + БД) и статика сайта (с правками шаблонов)';

    public function handle(): int
    {
        $quality = (string) $this->option('quality');
        $dryRun = (bool) $this->option('dry-run');
        $removeOriginal = (bool) $this->option('remove-original');
        $updateRefs = ! (bool) $this->option('no-update-refs');
        $skipProducts = (bool) $this->option('skip-products');
        $skipStatic = (bool) $this->option('skip-static');

        if ($skipProducts && $skipStatic) {
            $this->error('Укажите хотя бы один тип изображений для конвертации.');

            return self::FAILURE;
        }

        if ($dryRun) {
            $this->warn('Режим dry-run: файлы и БД не будут изменены.');
        }

        $exitCode = self::SUCCESS;

        if (! $skipProducts) {
            $this->newLine();
            $this->info('=== Изображения товаров (storage + БД) ===');

            $productOptions = [
                '--quality' => $quality,
            ];
            if ($dryRun) {
                $productOptions['--dry-run'] = true;
            }

            $code = $this->call('images:migrate-storage-to-webp', $productOptions);
            if ($code !== self::SUCCESS) {
                $exitCode = self::FAILURE;
            }
        }

        if (! $skipStatic) {
            $this->newLine();
            $this->info('=== Статика сайта (public/avi-dveri_assets) ===');

            $staticOptions = [
                '--quality' => $quality,
            ];
            if ($dryRun) {
                $staticOptions['--dry-run'] = true;
            }
            if ($removeOriginal && ! $dryRun) {
                $staticOptions['--remove-original'] = true;
            }
            if ($updateRefs) {
                $staticOptions['--update-refs'] = true;
            }

            $code = $this->call('images:convert-public-to-webp', $staticOptions);
            if ($code !== self::SUCCESS) {
                $exitCode = self::FAILURE;
            }
        }

        $this->newLine();
        if ($exitCode === self::SUCCESS) {
            $this->info('Миграция завершена успешно.');
        } else {
            $this->error('Миграция завершена с ошибками. Проверьте лог выше.');
        }

        return $exitCode;
    }
}
