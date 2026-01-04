<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminAuth::class,
        ]);

        // Add security headers to web middleware
        $middleware->web(append: [
            \App\Http\Middleware\SecurityHeaders::class,
        ]);
    })
    ->withSchedule(function (Schedule $schedule): void {
        // Send H-1 booking reminders daily at 9:00 AM
        $schedule->command('bookings:send-reminders')
            ->dailyAt('09:00')
            ->timezone('Asia/Jakarta');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
