<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Schema::defaultStringLength(191);

		Blade::if ('signedIn', function () {
			return auth()->check();
		});

		View::composer('*', 'App\Http\Composers\BlogComposer');
		View::composer('*', 'App\Http\Composers\AuthComposer');

		Category::deleting(function ($category) {
			$category->posts()->delete();
			$category->images()->delete();
			$category->projects()->delete();
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
	}
}
