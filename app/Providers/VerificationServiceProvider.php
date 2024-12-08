<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EmailVerificationService;
use App\Services\TwilioVerificationService;

class VerificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind services into the container
        $this->app->singleton(EmailVerificationService::class, function ($app) {
            return new EmailVerificationService();
        });

        $this->app->singleton(TwilioVerificationService::class, function ($app) {
            return new TwilioVerificationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
