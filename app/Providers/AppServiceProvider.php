<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthorService;
use App\Services\Interfaces\IAuthorService;
use App\Services\BookService;
use App\Services\Interfaces\IBookService;
use App\Services\CategoryService;
use App\Services\Interfaces\ICategoryService;
use App\Services\LoanService;
use App\Services\Interfaces\ILoanService;
use App\Services\NotificationService;
use App\Services\Interfaces\INotificationService;
use App\Services\PermissionService;
use App\Services\Interfaces\IPermissionService;
use App\Services\RoleService;
use App\Services\ReviewService;
use App\Services\Interfaces\IReviewService;
use App\Services\Interfaces\IRoleService;
use App\Services\UserService;
use App\Services\Interfaces\IUserService;
use Spatie\Permission\Traits\HasRoles;
use App\Policies\PostPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthorService::class, function ($app) {
            return new AuthorService();
        });

        $this->app->bind(IBookService::class, function ($app) {
            return new BookService();
        });

        $this->app->bind(ICategoryService::class, function ($app) {
            return new CategoryService();
        });
        
        $this->app->bind(ILoanService::class, function($app)
        {
            return new LoanService();
        });

        $this->app->bind(INotificationService::class, function($app)
        {
            return new NotificationService();
        });

        $this->app->bind(IPermissionService::class, function($app)
        {
            return new PermissionService();
        });

        $this->app->bind(IReviewService::class, function($app)
        {
            return new ReviewService();
        });

        $this->app->bind(IRoleService::class, function($app)
        {
            return new RoleService();
        });

        $this->app->bind(IUserService::class, function($app)
        {
            return new UserService();
        });
    }

    /**
     * Bootstrap any application services.
     */
}
