<div style="position: absolute; {{ config('toasts.position_x', 'right') }}: 0; {{ config('toasts.position_y', 'top') }}: 0;">
    <div id="toast-container" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; margin: 10px">
        @foreach (session('toasts', collect())->toArray() as $toast)
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ config('toasts.delay', 7000) }}"
                 data-autohide="{{ (!$toast['important']) ? 'true' : 'false'}}">

                <div class="toast-header bg-{{ $toast['level'] }} {{ ($toast['level'] == 'warning') ? 'text-dark' : 'text-light'}}">
                    <strong class="mr-auto">{{ ($toast['title']) ? $toast['title'] : config('toasts.default_title') }}</strong>
                    <small>{{ $toast['time'] }}</small>

                    @if ($toast['important'])
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    @endif
                </div>

                <div class="toast-body">
                    {!! $toast['message'] !!}
                </div>
            </div>
        @endforeach

    </div>
</div>

{{ session()->forget('toasts') }}
