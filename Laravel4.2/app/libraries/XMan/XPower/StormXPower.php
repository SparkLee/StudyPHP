<?php

namespace Libraries\XMan\XPower;

/**
 * 具体暴风能力的超能力
 * @author Administrator
 *
 */
class StormXPower implements XPowerInterface {
	private $app;
	private $x_power_description; //超能力描述
	
	public function __construct($app) {
		$this->app = $app;
		$this->x_power_description = $this->app['config']->get('xman.xpower.stormxpower.description');
	}
	
	public function getXPowerDescription() {
		return $this->x_power_description;
	}
}

?>