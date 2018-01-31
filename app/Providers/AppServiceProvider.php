<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //5.4之后string采用mb4string字符编码,这里4个byte才对应一个字符，767/4=191.xxxx
        Schema::defaultStringLength(191);
        \View::composer('layouts.sidebar',function($view){
            $topics = \App\Model\Topic::all();    //取出所有专题
            $view->with('topics',$topics);
        });

        \DB::listen(function($query){
            $sql = $query->sql;
            $bindings = $query->bindings;
            $time = $query->time;
            \Log::debug(var_export(compact('sql','bindings','time'),true));
        });
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
