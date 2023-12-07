<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use App\Models\User;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $this->defineGateCategory();
        Gate::define('product-list',function(User $user) {
            return $user->checkPermissionAccess('product_list');
        });
        Gate::define('product-edit',function(User $user,$id) {
            $product = Product::find($id);
            if ($user->checkPermissionAccess('product_edit') && $user->id === $product->user_id) {
                return true;
            }
            return false;
        });
        
    }
    public function defineGateCategory(){
        Gate::define('category-list', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
    }
}
