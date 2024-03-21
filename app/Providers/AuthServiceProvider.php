<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Apoteker
        Gate::define('apoteker-only', function ($user) {
            if ($user->level == 'Apoteker') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk Gudang
        Gate::define('gudang-only', function ($user) {
            if ($user->level == 'Gudang') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk Kasir
        Gate::define('kasir-only', function ($user) {
            if ($user->level == 'Kasir') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk Pemilik
        Gate::define('pemilik-only', function ($user) {
            if ($user->level == 'pemilik') {
                return true;
            }
            return false;
        });
    }
}