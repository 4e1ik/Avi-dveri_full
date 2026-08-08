@php
    $allTags = \App\Models\Tag::query()->orderBy('name')->get();
    $selectedTagIds = collect(old('tags', $selectedTagIds ?? []))->map(fn ($id) => (int) $id)->all();
    $modalId = 'productTagsModal';
    $selectedTags = $allTags->whereIn('id', $selectedTagIds)->values();
    $unselectedTags = $allTags->whereNotIn('id', $selectedTagIds)->values();
@endphp
@if ($allTags->isNotEmpty())
    <div class="col-md-12 padding-0 admin-product-field-block admin-product-tags" data-product-tags style="clear: both; float: left; width: 100%; margin-top: 12px;">
        <h3>Теги</h3>
        <div class="admin-product-tags__pills" data-tags-pills>
            @foreach ($selectedTags as $tagItem)
                <span class="admin-product-tags__pill" data-tag-id="{{ $tagItem->id }}">
                    {{ $tagItem->name }}
                    <button type="button" class="admin-product-tags__pill-remove" data-tag-remove="{{ $tagItem->id }}" aria-label="Удалить">&times;</button>
                </span>
            @endforeach
            <button type="button"
                    class="admin-product-tags__pill admin-product-tags__pill--add"
                    data-toggle="modal"
                    data-target="#{{ $modalId }}"
                    title="Добавить или изменить теги">
                + тег
            </button>
        </div>
        <div class="admin-product-tags__inputs" data-tags-inputs>
            @foreach ($selectedTagIds as $tagId)
                <input type="hidden" name="tags[]" value="{{ $tagId }}">
            @endforeach
        </div>

        <div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modalId }}Label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="{{ $modalId }}Label">Теги товара</h4>
                    </div>
                    <div class="modal-body">
                        <div class="admin-product-tags__section">
                            <div class="admin-product-tags__section-title">Выбранные</div>
                            <div class="admin-product-tags__pills admin-product-tags__pills--modal" data-modal-selected>
                                @forelse ($selectedTags as $tagItem)
                                    <span class="admin-product-tags__pill" data-tag-id="{{ $tagItem->id }}" data-tag-name="{{ $tagItem->name }}">
                                        {{ $tagItem->name }}
                                        <button type="button" class="admin-product-tags__pill-remove" data-modal-unselect="{{ $tagItem->id }}" aria-label="Убрать">&times;</button>
                                    </span>
                                @empty
                                    <span class="admin-product-tags__empty" data-selected-empty>Пока ничего не выбрано</span>
                                @endforelse
                            </div>
                        </div>
                        <hr>
                        <div class="admin-product-tags__section">
                            <div class="admin-product-tags__section-title">Доступные</div>
                            <div class="admin-product-tags__pills admin-product-tags__pills--modal" data-modal-available>
                                @foreach ($unselectedTags as $tagItem)
                                    <button type="button"
                                            class="admin-product-tags__pill admin-product-tags__pill--available"
                                            data-tag-id="{{ $tagItem->id }}"
                                            data-tag-name="{{ $tagItem->name }}"
                                            data-modal-select="{{ $tagItem->id }}">
                                        {{ $tagItem->name }}
                                    </button>
                                @endforeach
                                <span class="admin-product-tags__empty" data-available-empty style="{{ $unselectedTags->isEmpty() ? '' : 'display:none;' }}">
                                    Все теги уже выбраны
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-success" data-tags-apply>Готово</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .admin-product-tags__pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 4px;
            min-height: 28px;
            align-items: center;
            width: 100%;
        }
        .admin-product-tags__pills--modal {
            min-height: 40px;
            max-height: 180px;
            overflow-y: auto;
            padding: 4px 0;
        }
        .admin-product-tags__section-title {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #888;
            margin-bottom: 8px;
        }
        .admin-product-tags__pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 999px;
            background: #eef5fb;
            border: 1px solid #c8ddf0;
            color: #3a6ea5;
            font-size: 13px;
            line-height: 1.3;
        }
        .admin-product-tags__pill--available {
            background: #f5f5f5;
            border-color: #ddd;
            color: #666;
            cursor: pointer;
        }
        .admin-product-tags__pill--available:hover {
            background: #e8f4e8;
            border-color: #b7d7b7;
            color: #3d7a3d;
        }
        .admin-product-tags__pill--add {
            background: #fff;
            border-style: dashed;
            border-color: #c8a165;
            color: #c8a165;
            cursor: pointer;
            font-weight: 600;
        }
        .admin-product-tags__pill--add:hover {
            background: #faf6f0;
            color: #a8844a;
        }
        .admin-product-tags__pill-remove {
            border: 0;
            background: transparent;
            color: #7a9bb8;
            font-size: 16px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
        }
        .admin-product-tags__pill-remove:hover {
            color: #c0392b;
        }
        .admin-product-tags__empty {
            color: #999;
            font-size: 13px;
            font-style: italic;
        }
    </style>

    <script>
        (function () {
            function initProductTags(root) {
                if (!root || root.dataset.tagsReady === '1') return;
                root.dataset.tagsReady = '1';

                var formPills = root.querySelector('[data-tags-pills]');
                var inputs = root.querySelector('[data-tags-inputs]');
                var modal = root.querySelector('.modal');
                var selectedBox = root.querySelector('[data-modal-selected]');
                var availableBox = root.querySelector('[data-modal-available]');
                var applyBtn = root.querySelector('[data-tags-apply]');
                var addBtn = root.querySelector('.admin-product-tags__pill--add');

                function escapeHtml(text) {
                    var d = document.createElement('div');
                    d.textContent = text;
                    return d.innerHTML;
                }

                function getSelectedMap() {
                    var map = {};
                    selectedBox.querySelectorAll('[data-tag-id]').forEach(function (el) {
                        map[String(el.getAttribute('data-tag-id'))] = el.getAttribute('data-tag-name') || '';
                    });
                    return map;
                }

                function updateEmptyStates() {
                    var selectedEmpty = selectedBox.querySelector('[data-selected-empty]');
                    var availableEmpty = availableBox.querySelector('[data-available-empty]');
                    var hasSelected = selectedBox.querySelectorAll('[data-tag-id]').length > 0;
                    var hasAvailable = availableBox.querySelectorAll('[data-tag-id]').length > 0;
                    if (selectedEmpty) selectedEmpty.style.display = hasSelected ? 'none' : '';
                    if (availableEmpty) availableEmpty.style.display = hasAvailable ? 'none' : '';
                }

                function makeSelectedPill(id, name) {
                    var pill = document.createElement('span');
                    pill.className = 'admin-product-tags__pill';
                    pill.setAttribute('data-tag-id', id);
                    pill.setAttribute('data-tag-name', name);
                    pill.innerHTML = escapeHtml(name) +
                        ' <button type="button" class="admin-product-tags__pill-remove" data-modal-unselect="' + id + '" aria-label="Убрать">&times;</button>';
                    return pill;
                }

                function makeAvailablePill(id, name) {
                    var btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'admin-product-tags__pill admin-product-tags__pill--available';
                    btn.setAttribute('data-tag-id', id);
                    btn.setAttribute('data-tag-name', name);
                    btn.setAttribute('data-modal-select', id);
                    btn.textContent = name;
                    return btn;
                }

                function selectTag(id, name) {
                    var existing = availableBox.querySelector('[data-tag-id="' + id + '"]');
                    if (existing) existing.remove();
                    if (!selectedBox.querySelector('[data-tag-id="' + id + '"]')) {
                        var empty = selectedBox.querySelector('[data-selected-empty]');
                        if (empty) empty.style.display = 'none';
                        selectedBox.appendChild(makeSelectedPill(id, name));
                    }
                    updateEmptyStates();
                }

                function unselectTag(id, name) {
                    var existing = selectedBox.querySelector('[data-tag-id="' + id + '"]');
                    if (existing) {
                        name = existing.getAttribute('data-tag-name') || name || '';
                        existing.remove();
                    }
                    if (!availableBox.querySelector('[data-tag-id="' + id + '"]')) {
                        var empty = availableBox.querySelector('[data-available-empty]');
                        if (empty) empty.style.display = 'none';
                        availableBox.insertBefore(makeAvailablePill(id, name), empty || null);
                    }
                    updateEmptyStates();
                }

                function syncFormFromModal() {
                    var map = getSelectedMap();
                    var ids = Object.keys(map);

                    // form pills: keep add button
                    formPills.querySelectorAll('.admin-product-tags__pill:not(.admin-product-tags__pill--add)').forEach(function (el) {
                        el.remove();
                    });
                    ids.forEach(function (id) {
                        var pill = document.createElement('span');
                        pill.className = 'admin-product-tags__pill';
                        pill.setAttribute('data-tag-id', id);
                        pill.innerHTML = escapeHtml(map[id]) +
                            ' <button type="button" class="admin-product-tags__pill-remove" data-tag-remove="' + id + '" aria-label="Удалить">&times;</button>';
                        formPills.insertBefore(pill, addBtn);
                    });

                    inputs.innerHTML = '';
                    ids.forEach(function (id) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'tags[]';
                        input.value = id;
                        inputs.appendChild(input);
                    });
                }

                function rebuildModalFromForm() {
                    var formIds = Array.prototype.slice.call(inputs.querySelectorAll('input[name="tags[]"]'))
                        .map(function (el) { return String(el.value); });

                    // Collect all known tags from modal
                    var all = {};
                    selectedBox.querySelectorAll('[data-tag-id]').forEach(function (el) {
                        all[String(el.getAttribute('data-tag-id'))] = el.getAttribute('data-tag-name') || '';
                    });
                    availableBox.querySelectorAll('[data-tag-id]').forEach(function (el) {
                        all[String(el.getAttribute('data-tag-id'))] = el.getAttribute('data-tag-name') || '';
                    });

                    selectedBox.querySelectorAll('[data-tag-id]').forEach(function (el) { el.remove(); });
                    availableBox.querySelectorAll('[data-tag-id]').forEach(function (el) { el.remove(); });

                    Object.keys(all).sort(function (a, b) {
                        return (all[a] || '').localeCompare(all[b] || '', 'ru');
                    }).forEach(function (id) {
                        if (formIds.indexOf(id) !== -1) {
                            selectedBox.appendChild(makeSelectedPill(id, all[id]));
                        } else {
                            var empty = availableBox.querySelector('[data-available-empty]');
                            availableBox.insertBefore(makeAvailablePill(id, all[id]), empty || null);
                        }
                    });
                    updateEmptyStates();
                }

                selectedBox.addEventListener('click', function (e) {
                    var btn = e.target.closest('[data-modal-unselect]');
                    if (!btn) return;
                    e.preventDefault();
                    var id = btn.getAttribute('data-modal-unselect');
                    var pill = btn.closest('[data-tag-id]');
                    unselectTag(id, pill ? pill.getAttribute('data-tag-name') : '');
                });

                availableBox.addEventListener('click', function (e) {
                    var btn = e.target.closest('[data-modal-select]');
                    if (!btn) return;
                    e.preventDefault();
                    selectTag(btn.getAttribute('data-modal-select'), btn.getAttribute('data-tag-name') || btn.textContent.trim());
                });

                formPills.addEventListener('click', function (e) {
                    var btn = e.target.closest('[data-tag-remove]');
                    if (!btn) return;
                    e.preventDefault();
                    var id = btn.getAttribute('data-tag-remove');
                    var pill = btn.closest('[data-tag-id]');
                    var name = pill ? pill.textContent.replace('×', '').trim() : '';
                    // remove from form immediately
                    var input = inputs.querySelector('input[value="' + id + '"]');
                    if (input) input.remove();
                    if (pill) pill.remove();
                    // keep modal state in sync if open later
                    unselectTag(id, name);
                });

                if (applyBtn) {
                    applyBtn.addEventListener('click', function () {
                        syncFormFromModal();
                        if (window.jQuery) window.jQuery(modal).modal('hide');
                    });
                }

                if (window.jQuery && modal) {
                    window.jQuery(modal).on('show.bs.modal', rebuildModalFromForm);
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('[data-product-tags]').forEach(initProductTags);
            });
        })();
    </script>
@endif
