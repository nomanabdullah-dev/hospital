<?php

namespace App\Providers;

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
        $path = app_path('Repositories');
        $files = \File::allFiles($path);
        foreach($files as $file) {
            $file = pathinfo($file);
            $repository_name = $file['filename'];
            $interface = explode('Repository',$repository_name)[0];
            $this->app->bind("App\Interfaces\\{$interface}Interface", "App\Repositories\\{$repository_name}");
        }
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
