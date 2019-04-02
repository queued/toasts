<?php

namespace Queued\Toasts;

use Illuminate\Session\Store;
use Illuminate\Support\Traits\Macroable;

class ToastNotifier
{
    use Macroable;

    /**
     * The messages collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $toasts;

    /**
     * Laravel Session Store instance
     *
     * @var Store
     */
    public $session;

    /**
     * Create a new ToastNotifier instance.
     */
    function __construct(Store $store)
    {
        $this->session = $store;
        $this->toasts = collect();
    }

    /**
     * Toasts an information message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function info($message = null)
    {
        return $this->toast($message, 'info');
    }

    /**
     * Toasts a success message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function success($message = null)
    {
        return $this->toast($message, 'success');
    }

    /**
     * Toasts an error message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function error($message = null)
    {
        return $this->toast($message, 'danger');
    }

    /**
     * Toasts a warning message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function warning($message = null)
    {
        return $this->toast($message, 'warning');
    }

    /**
     * Set the title of the last toast
     *
     * @param null|string $title
     * @return $this
     */
    public function title($title)
    {
        $this->updateLastToast(compact('title'));

        return $this;
    }

    /**
     * Set the time of the last toast (right side of the toast header)
     *
     * @param null|string $time
     * @return $this
     */
    public function time($time)
    {
        $this->updateLastToast(compact('time'));

        return $this;
    }

    /**
     * Toasts a general message.
     *
     * @param  string|null $message
     * @param  string|null $level
     * @return $this
     */
    public function toast($message = null, $level = null)
    {
        // If no message was provided, we should update
        // the most recently added message.
        if (!$message) {
            return $this->updateLastToast(compact('level'));
        }

        if (!$message instanceof Toast) {
            $message = new Toast(compact('message', 'level'));
        }

        $this->toasts->push($message);

        return $this->flash();
    }

    /**
     * Modify the most recently added message.
     *
     * @param  array $overrides
     * @return $this
     */
    protected function updateLastToast($overrides = [])
    {
        $this->toasts->last()->update($overrides);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        return $this->updateLastToast(['important' => true]);
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->toasts = collect();

        return $this;
    }

    /**
     * Toasts all messages to the session.
     */
    protected function flash()
    {
        $this->session->flash('toasts', $this->toasts);

        return $this;
    }
}

