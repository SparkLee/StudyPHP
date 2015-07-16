<?php

namespace Libraries\XMan\Facades;

use Illuminate\Support\Facades\Facade;

class IronXMan extends Facade {
	protected static function getFacadeAccessor() {
		return 'ironxman';
	}
}