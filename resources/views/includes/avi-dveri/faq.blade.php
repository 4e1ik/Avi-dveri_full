@php
    $faqItems = config("catalog_faq.$faqKey", []);
@endphp

@if(!empty($faqItems))
    <div class="faq-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Часто задаваемые вопросы</h2>
                    </div>
                    <div class="faq-list" data-faq>
                        @foreach($faqItems as $index => $item)
                            <div class="faq-item">
                                <button
                                    type="button"
                                    class="faq-question"
                                    data-faq-question
                                    aria-expanded="false"
                                    aria-controls="faq-answer-{{ $faqKey }}-{{ $index }}"
                                    id="faq-question-{{ $faqKey }}-{{ $index }}"
                                >
                                    <span>{{ $item['question'] }}</span>
                                    <span class="faq-icon" aria-hidden="true">+</span>
                                </button>
                                <div
                                    class="faq-answer"
                                    id="faq-answer-{{ $faqKey }}-{{ $index }}"
                                    role="region"
                                    aria-labelledby="faq-question-{{ $faqKey }}-{{ $index }}"
                                >
                                    <p>{{ $item['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @once
        @push('styles')
            <style>
                .faq-list {
                    margin-top: 30px;
                }
                .faq-item {
                    border: 1px solid #e7e7e7;
                    border-radius: 4px;
                    background: #fff;
                }
                .faq-item + .faq-item {
                    margin-top: 12px;
                }
                .faq-question {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 16px;
                    padding: 16px 20px;
                    border: 0;
                    background: transparent;
                    text-align: left;
                    font-weight: 700;
                    font-size: 17px;
                    color: #333;
                }
                .faq-icon {
                    min-width: 18px;
                    text-align: center;
                    font-size: 22px;
                    line-height: 1;
                    color: #666;
                }
                .faq-item.is-open .faq-icon {
                    content: '-';
                }
                .faq-answer {
                    display: none;
                    padding: 0 20px 16px;
                    font-size: 16px;
                    color: #666;
                    line-height: 1.6;
                }
                .faq-answer p {
                    margin: 0;
                    white-space: pre-line;
                }
            </style>
        @endpush

        @push('scripts')
            <script>
                document.addEventListener('click', function (event) {
                    var question = event.target.closest('[data-faq-question]');
                    if (!question) {
                        return;
                    }

                    var item = question.closest('.faq-item');
                    var answer = item ? item.querySelector('.faq-answer') : null;
                    if (!item || !answer) {
                        return;
                    }

                    var isOpen = item.classList.contains('is-open');
                    item.classList.toggle('is-open', !isOpen);
                    question.setAttribute('aria-expanded', String(!isOpen));
                    answer.style.display = isOpen ? 'none' : 'block';

                    var icon = question.querySelector('.faq-icon');
                    if (icon) {
                        icon.textContent = isOpen ? '+' : '−';
                    }
                });
            </script>
        @endpush
    @endonce
@endif
