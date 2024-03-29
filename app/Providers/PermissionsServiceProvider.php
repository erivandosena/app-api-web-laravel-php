<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Permissao;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;


class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permissao::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        //Blade directives
        Blade::directive('role', function ($role) {
             return "if(auth()->check() && auth()->user()->hasRole({$role})) :"; //retorne esta declaração if dentro da tag php
        });

        Blade::directive('endrole', function ($role) {
             return "endif;"; //retornar esta declaração endif dentro da tag php
        });
    }
}
