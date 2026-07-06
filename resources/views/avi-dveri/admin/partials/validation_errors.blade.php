@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                @php
                    [$userMessage, $devMessage] = array_pad(explode(' | DEV: ', $error, 2), 2, null);
                @endphp
                <li>
                    {{ trim($userMessage) }}
                    @if($devMessage)
                        <br><small class="text-muted"><code>{{ trim($devMessage) }}</code></small>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif
