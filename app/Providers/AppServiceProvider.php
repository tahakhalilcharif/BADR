<?php

namespace App\Providers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.layout_home', function ($view) {
            if(auth()->check()){
                $token = Auth::user()->createToken('AppService')->plainTextToken;
                $view->with('token', $token);
            }else{
                $view->with('token', null);
            }
        });

        View::composer('layouts.layout_emp', function ($view) {
            $user = auth()->user();
            $employee = Employee::where('user_id',$user->id)->first();
            $view->with('employee', $employee);
        });
    }
}
