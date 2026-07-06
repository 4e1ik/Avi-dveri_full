.PHONY: init app db-import migrate composer-install images-webp images-webp-dry

# Сборка и запуск контейнеров
init:
	docker compose up -d --build

# Shell в PHP-контейнере
app:
	docker exec -it php_avi-dveri bash

# Импорт дампа (положите avi_dveri_dump.sql в корень проекта)
db-import:
	@if [ ! -f avi_dveri_dump.sql ]; then \
		echo "Файл avi_dveri_dump.sql не найден."; \
		exit 1; \
	fi
	cat avi_dveri_dump.sql | docker exec -i avi-dveri_db mysql -uroot -proot wd05
	@echo "Импорт завершен успешно!"

# Миграции Laravel (внутри контейнера)
migrate:
	docker exec -it php_avi-dveri php artisan migrate

# Composer install (после первого init)
composer-install:
	docker exec -it php_avi-dveri composer install

# Конвертация всех изображений в WebP (товары + статика + БД + шаблоны)
images-webp:
	docker exec -it php_avi-dveri php artisan images:migrate-all-to-webp --remove-original

# Предпросмотр без изменений
images-webp-dry:
	docker exec -it php_avi-dveri php artisan images:migrate-all-to-webp --dry-run