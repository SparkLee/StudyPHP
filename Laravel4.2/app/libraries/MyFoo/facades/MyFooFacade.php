<?php
namespace GuJiTech\Libraries\MyFoo;

use Illuminate\Support\Facades\Facade;

class MyFooFacade extends Facade {
	protected static function getFacadeAccessor() {
		return 'foo';
	}
}