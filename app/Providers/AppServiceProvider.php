<?php

namespace App\Providers;

use App\Repositories\CacheMessages;
use App\Repositories\MessageInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(MessageInterface::class, CacheMessages::class);
        //Enlaza las dos clases la de la interface y la del cache
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
