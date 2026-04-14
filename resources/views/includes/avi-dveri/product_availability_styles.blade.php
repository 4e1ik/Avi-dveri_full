{{-- Страница товара: наличие под ценой; производитель (если есть); карточки в сетке --}}
<style>
    .product-info .product-availability-line {
        margin: -4px 0 0;
        padding: 0;
        font-family: "Lato", sans-serif;
    }

    .product-info .product-availability-value {
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
    }

    .product-info .product-availability-value.product-availability--in-stock {
        color: #5c7a52;
    }

    .product-info .product-availability-value.product-availability--on-order {
        color: #e09797;
    }

    .product-info .product-manufacturer-line {
        margin: 0;
        padding: 0;
        font-family: "Lato", sans-serif;
        line-height: 1.5;
    }

    .product-info .product-manufacturer-line .color-title {
        margin-right: 0.35em;
    }

    .product-info .product-manufacturer-name {
        font-size: 14px;
        font-weight: 400;
        color: #444444;
    }

    .product-info .product-availability-line + .product-description,
    .product-info .product-manufacturer-line + .product-description {
        border-top: 1px solid #eeeeee;
        padding-top: 18px;
        margin-top: 14px;
    }

    /* Карточки: подпись как у остальных строк, акцент только на значении */
    .product-details li span.product-availability--in-stock,
    .product-details li span.product-availability--on-order {
        font-weight: 600;
    }

    .product-details li span.product-availability--in-stock {
        color: #5c7a52;
    }

    .product-details li span.product-availability--on-order {
        color: #e09797;
    }
</style>
