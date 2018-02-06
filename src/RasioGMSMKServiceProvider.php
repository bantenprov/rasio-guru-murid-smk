<?php

namespace Bantenprov\RasioGMSMK;

use Illuminate\Support\ServiceProvider;
use Bantenprov\RasioGMSMK\Console\Commands\RasioGMSMKCommand;

/**
 * The RasioGMSMKServiceProvider class
 *
 * @package Bantenprov\RasioGMSMK
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGMSMKServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rasio-guru-murid-smk', function ($app) {
            return new RasioGMSMK;
        });

        $this->app->singleton('command.rasio-guru-murid-smk', function ($app) {
            return new RasioGMSMKCommand;
        });

        $this->commands('command.rasio-guru-murid-smk');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rasio-guru-murid-smk',
            'command.rasio-guru-murid-smk',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('rasio-guru-murid-smk.php');

        $this->mergeConfigFrom($packageConfigPath, 'rasio-guru-murid-smk');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'rasio-guru-murid-smk');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/rasio-guru-murid-smk'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'rasio-guru-murid-smk');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/rasio-guru-murid-smk'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'rasio-guru-murid-smk-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'rasio-guru-murid-smk-public');
    }
}
