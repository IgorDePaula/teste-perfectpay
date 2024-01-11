<?php

namespace App\Providers;

use App\Clients\Asaas;
use App\Http\Controllers\ProductController;
use App\Repositories\AsaasRepository;
use App\Repositories\Interfaces\AsaasRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\AsaasService;
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
        $this->registerRepositories();
        $this->registerServices();
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
            'base_uri' => config('asaas.url')[config('asaas.environment') == 'production' ? 'production' : 'sandbox'],
            'http_errors' => false,
            'headers' => [
                'access_token' => config('asaas.token'),
                'content-type' => 'application/json',
            ],
            'connect_timeout' => config('asaas.timeout'),
        ]));

        $this->app->singleton(Asaas::class, fn (Application $app) => new Asaas($app->make(Client::class)));
    }

    public function registerRepositories(): void
    {
        $this->app->singleton(AsaasRepositoryInterface::class, fn (Application $app) => new AsaasRepository($app->make(Asaas::class)));
    }

    public function registerServices(): void
    {
        $this->app->when(ProductController::class)
            ->needs(ProductRepositoryInterface::class)
            ->give(ProductRepository::class);

        $this->app->when(AsaasService::class)
            ->needs(AsaasRepositoryInterface::class)
            ->give(AsaasRepository::class);
    }
}
