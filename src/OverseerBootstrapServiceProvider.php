<?php

namespace Exfriend\OverseerBootstrap;

use Illuminate\Support\ServiceProvider;

class OverseerBootstrapServiceProvider extends ServiceProvider
{
    public function boot()
    {
        require __DIR__ . '/helpers.php';
        if ( !$this->app->routesAreCached() )
        {
            require __DIR__ . '/routes.php';
        }
        $this->publishes( [
            __DIR__ . '/public' => public_path( 'vendor/overseer-bootstrap' ),
        ], 'overseer-bootstrap' );

        $this->loadViewsFrom( __DIR__ . '/views', 'overseer-bootstrap' );


        $this->publishes( [
            __DIR__ . '/views' => resource_path( 'views/vendor/overseer-bootstrap' ),
        ], 'overseer-bootstrap' );

        $this->loadTranslationsFrom( __DIR__ . '/lang', 'overseer' );

        $this->publishes( [
            __DIR__ . '/lang' => resource_path( 'lang/vendor/overseer' ),
        ] );
    }

    public function register()
    {

    }
}
