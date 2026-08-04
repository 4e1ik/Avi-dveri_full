document.addEventListener('DOMContentLoaded', function () {
    // Скролл для сертификатов
    document.getElementById('certPrev')?.addEventListener('click', function () {
        document.getElementById('certificatesTrack').scrollBy({
            left: -280,
            behavior: 'smooth'
        });
    });
    document.getElementById('certNext')?.addEventListener('click', function () {
        document.getElementById('certificatesTrack').scrollBy({
            left: 280,
            behavior: 'smooth'
        });
    });

    // Скролл для примеров работ
    document.getElementById('workPrev')?.addEventListener('click', function () {
        document.getElementById('worksTrack').scrollBy({
            left: -280,
            behavior: 'smooth'
        });
    });
    document.getElementById('workNext')?.addEventListener('click', function () {
        document.getElementById('worksTrack').scrollBy({
            left: 280,
            behavior: 'smooth'
        });
    });

    // Лайтбокс
    document.querySelectorAll('.about-page__gallery-image').forEach(function (item) {
        item.addEventListener('click', function () {
            const overlay = document.createElement('div');
            overlay.className = 'about-lightbox-overlay';
            overlay.innerHTML = `
                <div class="about-lightbox-content">
                    <button class="about-lightbox-close">✕</button>
                    <img src="/path/to/image.jpg" alt="Изображение" />
                </div>
            `;
            document.body.appendChild(overlay);
            document.body.style.overflow = 'hidden';

            overlay.addEventListener('click', function (e) {
                if (e.target === this || e.target.classList.contains(
                    'about-lightbox-close')) {
                    this.remove();
                    document.body.style.overflow = '';
                }
            });
        });
    });
});
