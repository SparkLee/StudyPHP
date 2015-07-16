<?php

namespace Libraries\XMan\Facades;

use Illuminate\Support\Facades\Facade;

class FlyXMan extends Facade {
	protected static function getFacadeAccessor() {
		return 'flyxman';
	}
}