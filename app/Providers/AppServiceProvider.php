<?php

namespace Corp\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        //
        //@set($i, 10)
        Blade::directive('set', function($exp){
            list($name, $val) = explode(',', $exp);
            return "<?php $name = $val ?>";
        });
    }
}
