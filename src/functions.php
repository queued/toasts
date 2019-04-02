<?php

if (!function_exists('toast')) {
    /**
     * Arrange for a toast message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return Queued\Toasts\ToastsNotifier
     */
    function toast($message = null, $level = 'light')
    {
        $notifier = app('toast');

        if (!is_null($message)) {
            return $notifier->toast($message, $level);
        }

        return $notifier;
    }

}
