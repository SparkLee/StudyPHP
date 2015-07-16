<?php
namespace Libraries\XMan;

use Illuminate\Support\ServiceProvider;
use Libraries\XMan\XPower\StormXPower;
use Libraries\XMan\XPower\FireXPower;
use Libraries\XMan\XPower\FlyXPower;
use Libraries\XMan\XPower\IronXPower;

class XManServiceProvider extends ServiceProvider {
	public function register() {
		$this->app->bind('firexman', function($app){
			$fire_xpower = new FireXPower($app);
			return new XMan($fire_xpower);
		});
		
		$this->app->bind('flyxman', function($app) {
			$fly_xpower = new FlyXPower($app);
			return new XMan($fly_xpower);
		});
		
		$this->app->bind('stormxman', function($app) {
			$storm_xpower = new StormXPower($app);
			return new XMan($storm_xpower);
		});
		
		$this->app->bind('ironxman', function($app) {
			$iron_xpower = new IronXPower($app);
			return new XMan($iron_xpower);
		});
	}

	
}