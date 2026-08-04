// =======================================
// ТАБЫ НА СТРАНИЦЕ ТОВАРА
// =======================================

document.addEventListener('DOMContentLoaded', function() {
    // Переключение табов
    const tabs = document.querySelectorAll('.product-tabs-nav__link');
    
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Убираем активный класс у всех табов
            document.querySelectorAll('.product-tabs-nav__item').forEach(function(item) {
                item.classList.remove('active');
            });
            
            // Добавляем активный класс текущему табу
            this.closest('.product-tabs-nav__item').classList.add('active');
            
            // Скрываем все панели
            document.querySelectorAll('.product-tabs-content__panel').forEach(function(panel) {
                panel.classList.remove('active');
            });
            
            // Показываем нужную панель
            const targetId = this.getAttribute('data-tab');
            const targetPanel = document.getElementById('tab-' + targetId);
            if (targetPanel) {
                targetPanel.classList.add('active');
            }
        });
    });

    // =======================================
    // ЗВЕЗДЫ В ФОРМЕ ОТЗЫВА
    // =======================================
    
    const stars = document.querySelectorAll('.review-form__star');
    const ratingInput = document.getElementById('ratingValue');
    
    stars.forEach(function(star) {
        star.addEventListener('click', function() {
            const value = parseInt(this.getAttribute('data-value'));
            
            // Обновляем скрытое поле
            if (ratingInput) {
                ratingInput.value = value;
            }
            
            // Обновляем звезды
            stars.forEach(function(s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });
        
        // Hover эффект
        star.addEventListener('mouseenter', function() {
            const value = parseInt(this.getAttribute('data-value'));
            stars.forEach(function(s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.style.color = '#f5a623';
                } else {
                    s.style.color = '#ddd';
                }
            });
        });
        
        star.addEventListener('mouseleave', function() {
            const currentValue = parseInt(ratingInput ? ratingInput.value : 5);
            stars.forEach(function(s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= currentValue) {
                    s.style.color = '';
                } else {
                    s.style.color = '';
                }
            });
        });
    });
});