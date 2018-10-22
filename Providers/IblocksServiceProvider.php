<?php

namespace Modules\Iblocks\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Iblocks\Events\Handlers\RegisterIblocksSidebar;

class IblocksServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIblocksSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('blocks', array_dot(trans('iblocks::blocks')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('iblocks', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Iblocks\Repositories\BlockRepository',
            function () {
                $repository = new \Modules\Iblocks\Repositories\Eloquent\EloquentBlockRepository(new \Modules\Iblocks\Entities\Block());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iblocks\Repositories\Cache\CacheBlockDecorator($repository);
            }
        );
// add bindings

    }
}
