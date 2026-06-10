<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;

class DeferUntilResponseSent
{
    public static function run(callable $callback): void
    {
        app()->terminating(function () use ($callback) {
            static::flushResponseToClient();

            try {
                $callback();
            } catch (\Throwable $e) {
                Log::error('Deferred task failed', [
                    'error' => $e->getMessage(),
                ]);
            }
        });
    }

    public static function flushResponseToClient(): void
    {
        if (app()->runningUnitTests()) {
            return;
        }

        if (function_exists('session_write_close')) {
            session_write_close();
        }

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();

            return;
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        flush();
    }
}
