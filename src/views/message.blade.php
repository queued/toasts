<div style="position: absolute; {{ config('toasts.position_x', 'right') }}: 0; {{ config('toasts.position_y', 'top') }}: 0;">
    <div id="toast-container" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; margin: 10px">
        @foreach (session('toasts', collect())->toArray() as $toast)
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ config('toasts.delay', 7000) }}"
                 @if (!$toast['important']) data-autohide="true" @endif>
                @if($toast["title"])
                    <div class="toast-header">
                        <strong class="mr-auto">{{ $toast['title'] }}</strong>
                        <small>{{ $toast['time'] }}</small>
                        @if (!$toast['important'])
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endif
                    </div>
                @else
                    @if (!$toast['important'])
                        <div class="toast-header">
                            <div>
                                <button type="button" class="ml-2 mr-1 mb-1 close text-light" data-dismiss="toast"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="toast-body bg-{{ $toast['level'] }} {{ ($toast['level'] == 'warning') ? 'text-dark' : 'text-light'}}">
                    {!! $toast['message'] !!}
                </div>
            </div>
        @endforeach

    </div>
</div>

{{ session()->forget('toasts') }}
