<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Lib\CustomValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
    }
}
