// =======================================
// ТАБЫ НА СТРАНИЦЕ ТОВАРА
// =======================================

document.addEventListener('DOMContentLoaded', function () {
    // Переключение табов
    const tabs = document.querySelectorAll('.product-tabs-nav__link');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelectorAll('.product-tabs-nav__item').forEach(function (item) {
                item.classList.remove('active');
            });

            this.closest('.product-tabs-nav__item').classList.add('active');

            document.querySelectorAll('.product-tabs-content__panel').forEach(function (panel) {
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

    stars.forEach(function (star) {
        star.addEventListener('click', function () {
            const value = parseInt(this.getAttribute('data-value'));

            if (ratingInput) {
                ratingInput.value = value;
            }

            stars.forEach(function (s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });

        star.addEventListener('mouseenter', function () {
            const value = parseInt(this.getAttribute('data-value'));
            stars.forEach(function (s) {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.style.color = '#f5a623';
                } else {
                    s.style.color = '#ddd';
                }
            });
        });

        star.addEventListener('mouseleave', function () {
            const currentValue = parseInt(ratingInput ? ratingInput.value : 5);
            stars.forEach(function (s) {
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
    // ВСПЛЫВАЮЩЕЕ УВЕДОМЛЕНИЕ (TOAST)
    // =======================================

    function showToast(message, title) {
        title = title || 'Успешно!';

        var oldToast = document.querySelector('.custom-toast');
        if (oldToast) {
            oldToast.remove();
        }

        var toast = document.createElement('div');
        toast.className = 'custom-toast';
        toast.innerHTML = `
            <div class="custom-toast__icon">✓</div>
            <div class="custom-toast__content">
                <p class="custom-toast__title">${title}</p>
                <p class="custom-toast__message">${message}</p>
            </div>
            <button class="custom-toast__close">✕</button>
        `;
        document.body.appendChild(toast);

        toast.querySelector('.custom-toast__close').addEventListener('click', function () {
            closeToast(toast);
        });

        var timer = setTimeout(function () {
            closeToast(toast);
        }, 3000);

        toast.addEventListener('mouseenter', function () {
            clearTimeout(timer);
        });

        toast.addEventListener('mouseleave', function () {
            timer = setTimeout(function () {
                closeToast(toast);
            }, 2000);
        });

        function closeToast(el) {
            if (el.classList.contains('closing')) return;
            el.classList.add('closing');
            setTimeout(function () {
                el.remove();
            }, 400);
        }

        return toast;
    }

    // =======================================
    // ФУНКЦИЯ ДЛЯ ОТОБРАЖЕНИЯ ОШИБОК В ФОРМЕ
    // =======================================

    function showReviewErrors(errors, form) {
        // Очищаем старые ошибки
        form.querySelectorAll('.text-danger').forEach(function (el) {
            el.remove();
        });
        form.querySelectorAll('.form_error').forEach(function (el) {
            el.innerHTML = '';
        });
        form.querySelectorAll('.review-form__input, .review-form__textarea, .review-form__checkbox').forEach(function (el) {
            el.style.borderColor = '';
        });

        Object.entries(errors).forEach(function ([field, messages]) {
            // Для reCAPTCHA
            if (field === 'g-recaptcha-response') {
                var errorContainer = form.querySelector('.g-recaptcha-error');
                if (errorContainer) {
                    errorContainer.innerHTML = messages.map(function (msg) {
                        return '<div class="text-danger">' + msg + '</div>';
                    }).join('');
                }
                return;
            }

            // Для поля rating
            if (field === 'rating') {
                var target = form.querySelector('.review-form__rating');
                if (target) {
                    var errorContainer = target.closest('.review-form__group').querySelector('.form_error');
                    if (errorContainer) {
                        errorContainer.innerHTML = messages.map(function (msg) {
                            return '<div class="text-danger">' + msg + '</div>';
                        }).join('');
                    }
                }
                return;
            }

            // Для обычных полей (name, comment, agreement)
            var target = form.querySelector('[name="' + field + '"]');
            if (target) {
                var errorContainer = target.closest('.review-form__group').querySelector('.form_error');
                if (errorContainer) {
                    errorContainer.innerHTML = messages.map(function (msg) {
                        return '<div class="text-danger">' + msg + '</div>';
                    }).join('');
                    target.style.borderColor = 'red';
                }
            }
        });
    }

    // =======================================
    // ОТПРАВКА ФОРМЫ ОТЗЫВА
    // =======================================

    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Очищаем старые ошибки
            reviewForm.querySelectorAll('.text-danger').forEach(function (el) {
                el.remove();
            });
            reviewForm.querySelectorAll('.form_error').forEach(function (el) {
                el.innerHTML = '';
            });
            reviewForm.querySelectorAll('.review-form__input, .review-form__textarea, .review-form__checkbox').forEach(function (el) {
                el.style.borderColor = '';
            });

            const submitBtn = reviewForm.querySelector('.review-form__submit');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Отправка...';
            }

            const formData = new FormData(reviewForm);

            fetch(reviewForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData,
            })
            .then(function (response) {
                return response.json().then(function (data) {
                    return { ok: response.ok, data: data, status: response.status };
                });
            })
            .then(function (result) {
                // === ОБРАБОТКА ОШИБОК ВАЛИДАЦИИ ===
                if (!result.ok && result.status === 422 && result.data.errors) {
                    showReviewErrors(result.data.errors, reviewForm);
                    
                    // Прокручиваем к первой ошибке
                    var firstError = reviewForm.querySelector('.text-danger');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Отправить отзыв';
                    }
                    return;
                }

                // === ОБРАБОТКА ДРУГИХ ОШИБОК ===
                if (!result.ok) {
                    var errorDiv = document.createElement('div');
                    errorDiv.className = 'text-danger';
                    errorDiv.style.cssText = 'text-align: center; padding: 10px; margin: 10px 0; font-size: 16px; color: red;';
                    errorDiv.textContent = result.data.message || 'Произошла ошибка. Попробуйте еще раз.';
                    reviewForm.prepend(errorDiv);
                    
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Отправить отзыв';
                    }
                    return;
                }

                // === УСПЕШНАЯ ОТПРАВКА ===
                if (result.data && result.data.success) {
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
                        list.prepend(item);
                    }

                    reviewForm.reset();
                    if (ratingInput) {
                        ratingInput.value = '5';
                    }
                    stars.forEach(function (s) {
                        s.classList.toggle('active', parseInt(s.getAttribute('data-value'), 10) <= 5);
                    });

                    showToast('Ваш отзыв успешно отправлен!');
                }

                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Отправить отзыв';
                }
            })
            .catch(function (error) {
                console.error('Ошибка:', error);
                var errorDiv = document.createElement('div');
                errorDiv.className = 'text-danger';
                errorDiv.style.cssText = 'text-align: center; padding: 10px; margin: 10px 0; font-size: 16px; color: red;';
                errorDiv.textContent = 'Произошла ошибка при отправке отзыва. Попробуйте еще раз.';
                reviewForm.prepend(errorDiv);
                
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Отправить отзыв';
                }
            });
        });
    }
});