<?php

namespace App\Providers;

use App\Mail\VerifyEmail;
use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('read-self-post',function (){

            return auth()->user()->role->haspermission('read-self-post');
        });

        Gate::define('update-self-post',function (){
            return auth()->user()->role->haspermission('update-self-post');
        });

        Gate::define('delete-self-post',function (){
            return auth()->user()->role->haspermission('delete-self-post');
        });



        Gate::define('read-post',function (){
            return auth()->user()->role->haspermission('read-post');
        });

        Gate::define('create-post',function (){
            return auth()->user()->role->haspermission('create-post');
        });

        Gate::define('update-post',function (){
            return auth()->user()->role->haspermission('update-post');
        });

        Gate::define('delete-post',function (){
            return auth()->user()->role->haspermission('delete-post');
        });



        Gate::define('read-category',function (){
            return auth()->user()->role->haspermission('read-category');
        });

        Gate::define('create-category',function (){
            return auth()->user()->role->haspermission('create-category');
        });

        Gate::define('update-category',function (){
            return auth()->user()->role->haspermission('update-category');
        });

        Gate::define('delete-category',function (){
            return auth()->user()->role->haspermission('delete-category');
        });


        Gate::define('read-role',function (){
            return auth()->user()->role->haspermission('read-role');
        });

        Gate::define('create-role',function (){
            return auth()->user()->role->haspermission('create-role');
        });

        Gate::define('update-role',function (){
            return auth()->user()->role->haspermission('update-role');
        });

        Gate::define('delete-role',function (){
            return auth()->user()->role->haspermission('delete-role');
        });


        Gate::define('read-user',function (){
            return auth()->user()->role->haspermission('read-user');
        });

        Gate::define('create-user',function (){
            return auth()->user()->role->haspermission('create-user');
        });

        Gate::define('update-user',function (){
            return auth()->user()->role->haspermission('update-user');
        });

        Gate::define('delete-user',function (){
            return auth()->user()->role->haspermission('delete-user');
        });




        Gate::define('read-gallery',function (){
            return auth()->user()->role->haspermission('read-gallery');
        });

        Gate::define('create-gallery',function (){
            return auth()->user()->role->haspermission('create-gallery');
        });

        Gate::define('update-gallery',function (){
            return auth()->user()->role->haspermission('update-gallery');
        });

        Gate::define('delete-gallery',function (){
            return auth()->user()->role->haspermission('delete-gallery');
        });


        Gate::define('read-picture',function (){
            return auth()->user()->role->haspermission('read-picture');
        });

        Gate::define('create-picture',function (){
            return auth()->user()->role->haspermission('create-picture');
        });

        Gate::define('update-picture',function (){
            return auth()->user()->role->haspermission('update-picture');
        });

        Gate::define('delete-picture',function (){
            return auth()->user()->role->haspermission('delete-picture');
        });


        Gate::define('read-support',function (){
            return auth()->user()->role->haspermission('read-support');
        });

        Gate::define('create-support',function (){
            return auth()->user()->role->haspermission('create-support');
        });

        Gate::define('reply-support',function (){
            return auth()->user()->role->haspermission('reply-support');
        });

        Gate::define('delete-support',function (){
            return auth()->user()->role->haspermission('delete-support');
        });


        Gate::define('delete-comment',function (){
            return auth()->user()->role->haspermission('delete-comment');
        });

        
        Gate::define('view-client-dashboard',function (){
            return auth()->user()->role->haspermission('view-client-dashboard');
        });
    }
}
