<?php

namespace App\Providers;


use App\Lib\SortOrder;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class SortOrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SortOrder::class,
            function (){
                $request = $this->app->make(Request::class);
                $sortOrderQuery = $request->sort_order ?? "asc";
                return SortOrder::$sortOrderQuery();
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
