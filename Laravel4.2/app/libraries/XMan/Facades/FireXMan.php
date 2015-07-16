<?php

namespace Libraries\XMan\Facades;

use Illuminate\Support\Facades\Facade;

class FireXMan extends Facade {
	protected static function getFacadeAccessor() {
		return 'firexman';
	}
}