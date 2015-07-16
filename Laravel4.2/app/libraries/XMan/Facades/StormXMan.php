<?php

namespace Libraries\XMan\Facades;

use Illuminate\Support\Facades\Facade;

class StormXMan extends Facade {
	protected static function getFacadeAccessor() {
		return 'stormxman';
	}
}