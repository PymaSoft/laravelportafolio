<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // Lección 1 - Novedades de Laravel 5.8 ⇒ Registro automático de políticas
    // 'App\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    /* Gate::define('create-projects', function($user) {
      //return $user->email === 'superadmin@admin.net';
      return $user->role === 'admin';
    }); */

    //Gate::define('create-projects', 'App\Policies\ProjectPolicy@create');
  }
}