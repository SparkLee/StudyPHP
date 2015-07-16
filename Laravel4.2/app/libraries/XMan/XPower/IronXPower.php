<?php

namespace Libraries\XMan\XPower;

/**
 * 能够操控钢铁的超能力
 * @author Administrator
 *
 */
class IronXPower implements XPowerInterface {
	private $app;
	private $x_power_description; //超能力描述
	
	public function __construct($app) {
		$this->app = $app;
		$this->x_power_description = $this->app['config']->get('xman.xpower.ironxpower.description');
	}
	
	public function getXPowerDescription() {
		return $this->x_power_description;
	}
}

?>