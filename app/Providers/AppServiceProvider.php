<?php

namespace App\Providers;

use App\Clients\Asaas;
use GuzzleHttp\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerClients();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function registerClients(): void
    {
        $this->app->singleton(Client::class, fn () => new Client([
            'base_uri' => config('asaas.url')[config('asaas.env') == 'production' ?? 'sandbox'],
            'http_errors' => false,
            'headers' => [
                'access_token' => config('asaas.token'),
                'content-type' => 'application/json',
            ],
            'connect_timeout' => config('asaas.timeout'),
        ]));

        $this->app->singleton(Asaas::class, fn (Application $app) => new Asaas($app->make(Client::class)));
    }
}
