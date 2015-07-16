<?php
namespace GuJiTech\Libraries\MyFoo;

use Illuminate\Support\ServiceProvider;

class MyFooServiceProvider extends ServiceProvider {
	public function register() {
		$this->app->bind('foo', function($app){
			return new MyFoo($app);
		});
	}
}