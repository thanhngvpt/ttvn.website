<?php

namespace App\Http\Middleware\Web;

use App\Services\UserServiceInterface;
use App\Models\NewCategory;
use App\Models\Field;
use App\Models\Footer;
use \Request;

class SetDefaultValues
{
    /** @var UserServiceInterface */
    protected $userService;

    /**
     * Create a new filter instance.
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $user = $this->userService->getUser();
        $menu_news_categories = NewCategory::orderBy('order', 'asc')->get();
        $menu_fields = Field::all();
        $path_url = Request::segment(1);
        $footer = Footer::first();
        // dd($path_url);
        \View::share('authUser', $user);
        \View::share('menu_news_categories', $menu_news_categories);
        \View::share('menu_fields', $menu_fields);
        \View::share('path_url', $path_url);
        \View::share('footer', $footer);

        return $next($request);
    }
}
