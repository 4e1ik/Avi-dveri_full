@php
    /** @var \Illuminate\Support\Collection|\Illuminate\Pagination\LengthAwarePaginator $manufacturers */
@endphp
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 56px;">ID</th>
            <th>Название</th>
            <th>Slug</th>
            <th style="width: 120px;">Тип</th>
            <th style="width: 90px;">Активен</th>
            <th style="width: 90px;">Товаров</th>
            <th style="width: 200px;"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($manufacturers as $manufacturer)
            <tr class="{{ $manufacturer->active ? '' : 'warning' }}">
                <td>{{ $manufacturer->id }}</td>
                <td><strong>{{ $manufacturer->name }}</strong></td>
                <td><code>{{ $manufacturer->slug }}</code></td>
                <td>
                    @if($manufacturer->type === 'door')
                        <span class="label label-primary">Двери</span>
                    @elseif($manufacturer->type === 'fitting')
                        <span class="label label-info">Фурнитура</span>
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td>{{ $manufacturer->active ? 'Да' : 'Нет' }}</td>
                {{-- В контроллере желательно: Manufacturer::query()->withCount('products') --}}
                <td>{{ $manufacturer->products_count ?? '—' }}</td>
                <td>
                    <div class="admin-table-actions">
                        <a href="{{ route('edit_manufacturer', $manufacturer) }}" class="btn btn-outline btn-primary btn-sm">Изменить</a>
                        <form action="{{ route('destroy_manufacturer', [$manufacturer, $type]) }}" method="post"
                              onsubmit="return confirm('Удалить производителя «{{ e($manufacturer->name) }}»? У связанных товаров поле производителя будет сброшено.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Пока нет записей.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
