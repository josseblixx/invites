<?php

namespace Blixx\Invite;

use Blixx\Invite\Commands\BlixxInviteCommand;
use Illuminate\Support\ServiceProvider;

class BlixxInviteProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        // define routes
        include(__DIR__ . '/routes.php');

        // define views
        $this->loadViewsFrom(__DIR__.'/Views', 'blixx_invite');

        // define migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
        // define blixx:invite CLI command
        $this->commands([
            BlixxInviteCommand::class
        ]);


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
