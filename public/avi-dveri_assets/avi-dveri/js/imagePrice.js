document.addEventListener('DOMContentLoaded', function() {
    // Общие элементы
    const slickTrack = document.querySelector('.slick-track');
    const priceContainer = document.querySelector('.pro-price');
    const selectElement = document.getElementById("selector");
    let currentOption = 'option1';

    // Элементы для фильтрации по цвету
    const colorItems = document.querySelectorAll('.color-filter [data-color-value]');
    const mainSlides = document.querySelectorAll('.slider-for [data-color-value]');
    const navSlides = document.querySelectorAll('.slider-nav [data-color-value]');
    const allSlides = [...mainSlides, ...navSlides];

    // Конфигурация наблюдателя
    const config = {
        attributes: true,
        attributeFilter: ['class'],
        subtree: true
    };

    // Основные функции
    function updatePrice() {
        const activeSlide = slickTrack?.querySelector('.slick-slide.slick-current.slick-active');
        if(!activeSlide || !priceContainer) return;

        const priceData = {
            // Исправляем pricePerCanvas на pricePerSet и добавляем productPrice
            option1: activeSlide.dataset.price || activeSlide.dataset.pricePerSet || activeSlide.dataset.productPrice || '0',
            option2: activeSlide.dataset.pricePerSet || '0'
        };

        const divElement = document.querySelector(".fix");
        if(divElement) {
            divElement.className = `fix ${currentOption} mb-20`;
        }

        priceContainer.textContent = `${priceData[currentOption]}`;
    }

    function handleSelectChange() {
        currentOption = selectElement.value;
        updatePrice();
    }

    function handleColorFilter(e) {
        e.preventDefault();
        const selectedColor = this.dataset.colorValue;

        // Обновление слайдов
        allSlides.forEach(slide => {
            slide.classList.remove('slick-current', 'slick-active');
        });

        const targetSlides = document.querySelectorAll(
            `.slider-for [data-color-value="${selectedColor}"], 
             .slider-nav [data-color-value="${selectedColor}"]`
        );

        targetSlides.forEach(slide => {
            slide.classList.add('slick-current', 'slick-active');

            if (typeof $.fn.slick !== 'undefined' && slide.closest('.slider-for')) {
                const slideIndex = $(slide).data('slick-index');
                $(slide.closest('.slider-for')).slick('slickGoTo', slideIndex);
            }
        });

        // Принудительное обновление цены
        setTimeout(updatePrice, 100);
    }

    // Инициализация наблюдателя
    if(slickTrack) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(() => {
                if(document.querySelector('.slick-current.slick-active')) {
                    updatePrice();
                }
            });
        });

        const slides = slickTrack.querySelectorAll('.slick-slide');
        slides.forEach(slide => {
            observer.observe(slide, config);
        });
    }

    // Слушатели событий
    selectElement?.addEventListener('change', handleSelectChange);
    slickTrack?.addEventListener('click', updatePrice);
    colorItems.forEach(item => item.addEventListener('click', handleColorFilter));

    // Первоначальная инициализация
    updatePrice();
});