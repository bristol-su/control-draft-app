<?php

namespace App\Providers;

use BristolSU\ControlDB\Contracts\Models\Tags\GroupTag;
use BristolSU\ControlDB\Contracts\Models\Tags\PositionTag;
use BristolSU\ControlDB\Contracts\Models\Tags\UserTag;
use BristolSU\ControlDB\Contracts\Repositories\Group as GroupRepository;
use BristolSU\ControlDB\Contracts\Repositories\Position as PositionRepository;
use BristolSU\ControlDB\Contracts\Repositories\Role as RoleRepository;
use BristolSU\ControlDB\Contracts\Repositories\Tags\GroupTag as GroupTagRepository;
use BristolSU\ControlDB\Contracts\Repositories\Tags\PositionTag as PositionTagRepository;
use BristolSU\ControlDB\Contracts\Repositories\User as UserRepository;
use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\Position;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\User;
use BristolSU\Support\Control\Contracts\Models\Tags\RoleTag;
use BristolSU\Support\Control\Contracts\Repositories\Tags\RoleTag as RoleTagRepository;
use BristolSU\Support\Control\Contracts\Repositories\Tags\UserTag as UserTagRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('control_group', Group::class);
        Route::model('control_role', Role::class);
        Route::model('control_user', User::class);
        Route::model('control_position', Position::class);
        Route::model('control_group_tag', GroupTag::class);
        Route::model('control_role_tag', RoleTag::class);
        Route::model('control_user_tag', UserTag::class);
        Route::model('control_position_tag', PositionTag::class);

        Route::bind('control_group', function($id) {
            return app(GroupRepository::class)->getById($id);
        });
        Route::bind('control_role', function($id) {
            return app(RoleRepository::class)->getById($id);
        });
        Route::bind('control_user', function($id) {
            return app(UserRepository::class)->getById($id);
        });
        Route::bind('control_position', function($id) {
            return app(PositionRepository::class)->getById($id);
        });

        Route::bind('control_group_tag', function($id) {
            return app(GroupTagRepository::class)->getById($id);
        });
        Route::bind('control_role_tag', function($id) {
            return app(RoleTagRepository::class)->getById($id);
        });
        Route::bind('control_user_tag', function($id) {
            return app(UserTagRepository::class)->getById($id);
        });
        Route::bind('control_position_tag', function($id) {
            return app(PositionTagRepository::class)->getById($id);
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
