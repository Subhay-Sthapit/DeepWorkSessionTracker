<?php

namespace App\Providers;

use App\Http\Interfaces\DeepWorkInterface;
use App\Http\Repositories\DeepWorkRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DeepWorkInterface::class,DeepWorkRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
