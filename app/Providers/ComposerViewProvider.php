<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerViewProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 使用基于类的composers...
//        \View::composer(
//            'admin.common.navbar', 'App\ViewComposers\ViewComposer'
//        );
        View::composer(['admin.common.navbar','admin.common.sidebar'], function ($view){
            $user = Auth::guard('consoleUser')->user();
            $user['avatar'] = empty($user['avatar']) ? '/static/admin/images/head.png' : $user['avatar'] ;
            $view->with('user', $user);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
