<?php

namespace Corp\Providers;

use Corp\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Corp\Article;
use Corp\Policies\ArticlePolicy;
use Corp\Policies\PermissionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'Corp\Model' => 'Corp\Policies\ModelPolicy',
        Article::class => ArticlePolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function($user){
            dd($user);
            return $user->canDo(['VIEW_ADMIN', 'ADD_ARTICLES'], true);
        });

        Gate::define('VIEW_ADMIN_ARTICLES', function($user){
            dd($user);
            return $user->canDo('VIEW_ADMIN_ARTICLES', true);
        });

        Gate::define('EDIT_USERS', function($user){
            return $user->canDo('EDIT_USERS', true);
        });

        Gate::define('VIEW_ADMIN_MENU', function($user){
            return $user->canDo('VIEW_ADMIN_MENU', true);
        });
        //
    }
}
