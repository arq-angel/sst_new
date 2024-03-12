<?php

declare(strict_types=1);

namespace Modules\Services;

class Notification
{
    const SESSION_KEY = 'notifications';

    public static function add($message, $type = 'success'): void
    {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }

        $_SESSION[self::SESSION_KEY][] = ['message' => $message, 'type' => $type];
    }

    public static function get()
    {
        if (isset($_SESSION[self::SESSION_KEY])) {
            return $_SESSION[self::SESSION_KEY];

        }

        return [];
    }

    public static function clear(): void
    {
        if (isset($_SESSION[self::SESSION_KEY])) {
            unset($_SESSION[self::SESSION_KEY]);
        }
    }

    public static function getIcon($type): string
    {
        $icons = [
            'success' => 'fa-solid fa-circle-check',
            'warning' => 'fa-solid fa-triangle-exclamation',
            'info' => 'fa-solid fa-circle-exclamation',
            'danger' => 'fa-solid fa-skull-crossbones',
            'primary' => 'fa-solid fa-envelopes-bulk',
            'secondary' => 'fa-solid fa-thumbs-up',
        ];

        return $icons[$type] ?? '';
    }

    public static function render(): void
    {

        $notifications = self::get();

//        $notifications = [
//            [
//                'message' => 'Welcome to our website!',
//                'type' => 'success',
//            ],
//            [
//                'message' => 'Warning: Your account will expire soon.',
//                'type' => 'warning',
//            ],
//            [
//                'message' => 'Error: Unable to process your request.',
//                'type' => 'danger',
//            ],
//            [
//                'message' => 'Info: Check out our latest blog post.',
//                'type' => 'info',
//            ],
//            [
//                'message' => 'Congratulations! You\'ve earned a new badge.',
//                'type' => 'primary',
//            ],
//        ];

        foreach ($notifications as $notification) {
            $message = $notification['message'];
            $type = $notification['type'];
            $iconClass = self::getIcon($type);
            if (!empty($iconClass)) {
                echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">';
                echo '<div class="d-flex align-items-center">';
                echo '<i class="' . $iconClass . ' align-self-center" style="font-size: 2rem;"></i>';
                echo '<span class="ms-2">' . $message . '</span>';
                echo '</div>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
        }
        self::clear();
    }

    public static function getNotification(): array
    {
        self::add("Test Notification", 'warning');
        $notifications = self::get();
        self::clear();
        return $notifications;
    }

}

