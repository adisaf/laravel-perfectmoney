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
        $configPath = __DIR__ . '/../src/config/perfectmoney.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');

        // Views
        $viewPath = __DIR__ . '/../src/views';
        $this->loadViewsFrom($viewPath, 'laravelperfectmoney');
        $this->publishes([$viewPath => $this->getResourcesPath()], 'views');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../src/config/perfectmoney.php';
        $this->mergeConfigFrom($configPath, 'perfectmoney');

        $this->app->alias(PerfectMoney::class, 'perfectmoney');
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('perfectmoney.php');
    }

    /**
     * Get the resources path
     *
     * @return string
     */
    protected function getResourcesPath()
    {
        return resource_path('views/vendor/laravelperfectmoney');
    }
}
