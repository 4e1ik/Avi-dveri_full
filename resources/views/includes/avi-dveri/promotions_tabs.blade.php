<ul class="nav nav-tabs promotions-tabs mb-30" role="tablist">
    <li role="presentation" class="{{ ($activeTab ?? 'all') === 'all' ? 'active' : '' }}">
        <a href="{{ route('promotions') }}">Все</a>
    </li>
    @foreach(config('labels') as $key => $label)
        <li role="presentation" class="{{ ($activeTab ?? 'all') === $key ? 'active' : '' }}">
            <a href="{{ route('promotions.tab', ['slug' => $label['slug']]) }}">{{ $label['title'] }}</a>
        </li>
    @endforeach
</ul>
