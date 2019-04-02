<?php

namespace Queued\Toasts;

use ArrayAccess;

class Toast implements ArrayAccess
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title;

    /**
     * The body of the message.
     *
     * @var string
     */
    public $message;

    /**
     * The message level.
     *
     * @var string
     */
    public $level = 'white';

    /**
     * Whether the message should auto-hide.
     *
     * @var bool
     */
    public $important = false;

    /**
     * When this toast was created
     *
     * @var string
     */
    public $time = 'just now';

    /**
     * Create a new message instance.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->update($attributes);
    }

    /**
     * Update the attributes.
     *
     * @param  array $attributes
     * @return $this
     */
    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }


    /**
     * Whether the given offset exists.
     *
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Fetch the offset.
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Assign the offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Unset the offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}
