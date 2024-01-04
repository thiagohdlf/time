<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\{
    Profile,
    Permission,
    User,
};
use App\Policies\ProfilePolicy;
use Exception;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Profile::class => ProfilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        foreach($this->getPermission() as $permission){
            Gate::define($permission->name, function($user) use($permission){
                return $user->hasOnePermission($permission->profiles) || $user->isAdmin();
            });
        }

        Gate::define('owner', function(User $user, $object) {
            return $user->id === $object->user_id;
        });

        /*Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });*/
    }
    public function getPermission()
    {
        try{
            return Permission::with('profiles')->get();
        }catch(Exception $e){
            return [$e];
        }
    }
}
