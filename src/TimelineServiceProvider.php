<?php

namespace Litstack\Timeline;

use Ignite\Crud\CrudShow;
use Ignite\Support\Facades\Lit;
use Illuminate\Support\ServiceProvider;

class TimelineServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../migrations' => database_path('migrations'),
        ], 'timeline:migrations');

        Lit::script(__DIR__.'/../dist/timeline.js');

        CrudShow::macro('timeline', function () {
            $model = request()->route()->getConfig()->getModelInstance();

            return $this->component(new TimelineComponent($model));
        });
    }

    /**
     * Boot application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
