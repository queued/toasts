<?php

return [
    /*
     * Whether the message should auto-hide by default
     */
    'important' => false,

    /**
     * Delay before hiding the toast. Be sure to give a fair amount of time so the user can read the toast message.
     *
     * Note: this value is set in milliseconds
     */
    'delay' => 7000,

    /*
     * Default title to be used when no title is provided
     */
    'default_title' => 'Notification',

    /*
     * Defines the position of the toast on the browser
     */
    "position_x" => 'top', // "top" or "bottom"
    "position_y" => 'right', // "left" or "right"
];
