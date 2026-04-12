{{-- $activeTab: doors | fittings | general --}}
<ul class="nav nav-tabs manufacturer-admin-tabs" role="tablist">
    <li role="presentation" class="{{ ($activeTab ?? '') === 'doors' ? 'active' : '' }}">
        <a href="{{route('manufacturers', ['type' => 'door'])}}">Двери</a>
    </li>
    <li role="presentation" class="{{ ($activeTab ?? '') === 'fitting' ? 'active' : '' }}">
        <a href="{{route('manufacturers', ['type' => 'fitting'])}}">Фурнитура</a>
    </li>
    <li role="presentation" class="{{ ($activeTab ?? '') === 'general' ? 'active' : '' }}">
        <a href="{{route('manufacturers', ['type' => 'general'])}}">Общие бренды</a>
    </li>
</ul>