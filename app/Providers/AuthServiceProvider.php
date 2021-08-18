<?php

namespace App\Providers;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use App\Models\User;
use App\Policies\CartPolicy;
use App\Policies\ReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        Gate::define('manage-product',function (User $user, Product $product){
            $seller = Seller::where('user_id', $user->id)->first();
            return $seller->id == $product->seller_id;
        });
        Gate::define('create-review', [ReviewPolicy::class,'create']);
        Gate::define('update-review', [ReviewPolicy::class, 'update']);
        Gate::define('view-cart', [CartPolicy::class, 'view']);
    }
}
