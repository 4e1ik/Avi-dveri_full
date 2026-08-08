// =======================================
// ТАБЫ НА СТРАНИЦЕ ТОВАРА
// =======================================

document.addEventListener('DOMContentLoaded', function() {
    // Переключение табов
    const tabs = document.querySelectorAll('.product-tabs-nav__link');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelectorAll('.product-tabs-nav__item').forEach(function(item) {
                item.classList.remove('active');
            });

            this.closest('.product-tabs-nav__item').classList.add('active');

            document.querySelectorAll('.product-tabs-content__panel').forEach(function(panel) {
                panel.classList.remove('active');
            });

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

            if (ratingInput) {
                ratingInput.value = value;
            }

            stars.forEach(function(s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });

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

    // =======================================
    // ОТПРАВКА ФОРМЫ ОТЗЫВА
    // =======================================
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = reviewForm.querySelector('.review-form__submit');
            if (submitBtn) {
                submitBtn.disabled = true;
            }

            const formData = new FormData(reviewForm);

            fetch(reviewForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData,
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return { ok: response.ok, data: data };
                    });
                })
                .then(function (result) {
                    if (result.ok && result.data && result.data.success) {
                        const review = result.data.data;
                        const list = document.querySelector('.reviews-list');
                        const empty = list ? list.querySelector('.reviews-list__empty') : null;
                        if (empty) {
                            empty.remove();
                        }

                        if (list && review) {
                            let starsHtml = '';
                            for (let i = 1; i <= 5; i++) {
                                starsHtml += '<span class="review-item__star ' + (i <= review.rating ? 'active' : '') + '">★</span>';
                            }

                            const item = document.createElement('div');
                            item.className = 'review-item';
                            item.innerHTML =
                                '<div class="review-item__header">' +
                                '<span class="review-item__name">' + review.name + '</span>' +
                                '<div class="review-item__rating">' + starsHtml + '</div>' +
                                '<span class="review-item__date">' + (review.date || '') + '</span>' +
                                '</div>' +
                                '<div class="review-item__comment">' + review.comment + '</div>';
                            list.appendChild(item);
                        }

                        reviewForm.reset();
                        if (ratingInput) {
                            ratingInput.value = '5';
                        }
                        stars.forEach(function (s) {
                            s.classList.toggle('active', parseInt(s.getAttribute('data-value'), 10) <= 5);
                        });
                        alert(result.data.message || 'Отзыв отправлен');
                    } else {
                        var message = 'Не удалось отправить отзыв';
                        if (result.data) {
                            if (result.data.message) {
                                message = result.data.message;
                            } else if (result.data.errors) {
                                message = Object.values(result.data.errors).flat().join('\n');
                            }
                        }
                        alert(message);
                    }
                })
                .catch(function () {
                    alert('Не удалось отправить отзыв');
                })
                .finally(function () {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                    }
                });
        });
    }
});
