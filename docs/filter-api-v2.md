# Filter API v2

Тестовый endpoint фильтрации каталога. Старый `POST /api/filter` не затрагивается.

## Endpoint

- **URL:** `/api/filter/v2`
- **Method:** `POST`
- **Content-Type:** `application/json` или `multipart/form-data` / `application/x-www-form-urlencoded`
- **Auth:** не требуется

## Request body

| Поле | Тип | Обязательно | Описание |
|---|---|---|---|
| `category` | string | да | `door` или `fitting` |
| `type` | string | нет | Тип двери: `interior` / `entrance` |
| `material` | string[] | нет | Материалы двери |
| `function` | string[] | нет | Назначение двери / сегмент фурнитуры |
| `manufacturer_id` | int[] | нет | ID производителей |
| `label` | string[] | нет | Лейблы товара (`hit`, `sale`, …) |
| `price_filter` | string | нет | Сортировка цены: `ASC` или `DESC` |
| `page` | int | нет | Страница пагинации, по умолчанию `1` |

`per_page` фиксирован: **32** (`ProductPerPageEnum::DEFAULT`).

### Минимальный пример

```json
{
  "category": "door"
}
```

### Полный пример

```json
{
  "category": "door",
  "type": "entrance",
  "function": ["Улица", "Квартира"],
  "material": ["Металл"],
  "manufacturer_id": [1, 2],
  "label": ["hit"],
  "price_filter": "ASC",
  "page": 1
}
```

## Response

Обёртка `ApiResponse` + Laravel paginator:

```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 12,
        "slug": "dver-primer",
        "title": "Дверь Пример",
        "price": 450.0,
        "currency": "BYN",
        "availability": true,
        "label": ["hit"],
        "rating_avg": 4.67,
        "image": "https://example.com/storage/products/photo.webp",
        "url": "https://example.com/katalog/vhodnye-dveri/ulica/dver-primer"
      }
    ],
    "first_page_url": "...",
    "from": 1,
    "last_page": 3,
    "last_page_url": "...",
    "links": [],
    "next_page_url": "...",
    "path": "...",
    "per_page": 32,
    "prev_page_url": null,
    "to": 32,
    "total": 80
  }
}
```

### Поля товара (DTO)

| Поле | Тип | Описание |
|---|---|---|
| `id` | int | ID продукта |
| `slug` | string\|null | Slug |
| `title` | string | Название |
| `price` | float\|null | Цена |
| `currency` | string\|null | Валюта |
| `availability` | bool | В наличии |
| `label` | string[]\|null | Лейблы |
| `rating_avg` | float\|null | Средний рейтинг видимых отзывов |
| `image` | string\|null | URL первой картинки |
| `url` | string\|null | URL карточки товара |

## Ошибки

- **422** — ошибка валидации (например, нет `category` или неверное значение). Стандартный Laravel JSON:
  ```json
  {
    "message": "The category field is required.",
    "errors": {
      "category": ["The category field is required."]
    }
  }
  ```
- **500** — `{ "success": false, "message": "..." }`
