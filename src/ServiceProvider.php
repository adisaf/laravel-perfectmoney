<?php

namespace Adisaf\PerfectMoney;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        // Config
        $this->publishes([
            __DIR__ . '/../src/config/perfectmoney.php' => config_path('perfectmoney.php'),
        ], 'perfectmoney-config');

        // Views
        $this->loadViewsFrom(__DIR__ . '/../src/views', 'perfectmoney');
        $this->publishes([
            __DIR__ . '/../src/views' => resource_path('views/vendor/perfectmoney'),
        ], 'perfectmoney-view');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../src/config/perfectmoney.php',
            'perfectmoney'
        );

        $this->app->alias(PerfectMoney::class, 'perfectmoney');
    }
}
