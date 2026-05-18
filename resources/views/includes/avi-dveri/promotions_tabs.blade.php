<ul class="nav nav-tabs promotions-tabs mb-30" role="tablist">
    @foreach(config('promotions.tabs') as $key => $tab)
        <li role="presentation" class="{{ ($activeTab ?? 'all') === $key ? 'active' : '' }}">
            @if($tab['slug'] === null)
                <a href="{{ route('promotions') }}">{{ $tab['title'] }}</a>
            @else
                <a href="{{ route('promotions.tab', ['slug' => $tab['slug']]) }}">{{ $tab['title'] }}</a>
            @endif
        </li>
    @endforeach
</ul>
