@php
    $catalogTags = \App\Models\Tag::forCatalogDisplay();
    $activeTagSlug = $activeTagSlug ?? null;
    $visibleLimit = 10;
@endphp

@if ($catalogTags->isNotEmpty())
    <div class="tags-wrapper">
        <div class="container">
            <div class="tags" id="tagsContainer">
                @foreach ($catalogTags as $index => $catalogTag)
                    @php
                        $isHidden = $index >= $visibleLimit;
                        $isActive = $activeTagSlug === $catalogTag->slug;
                    @endphp
                    @if ($index === $visibleLimit)
                        <button type="button" class="tags__item tags__item--more" id="tagsMore">...</button>
                        <div class="tags__hidden" id="tagsHidden" style="display: contents;">
                    @endif
                    <a href="{{ route('tags.show', $catalogTag) }}"
                       class="tags__item {{ $isHidden ? 'tags__item--hidden' : '' }} {{ $isActive ? 'active' : '' }}">
                        {{ $catalogTag->name }}
                    </a>
                @endforeach
                @if ($catalogTags->count() > $visibleLimit)
                        </div>
                @endif
            </div>
        </div>
    </div>
@endif
