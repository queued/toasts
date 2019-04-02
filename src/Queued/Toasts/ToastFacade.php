<?php

namespace Queued\Toasts;

use Illuminate\Support\Facades\Facade;

class ToastFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toast';
    }
}