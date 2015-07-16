<?php

namespace Libraries\XMan\XPower;

/**
 * 具体控制火的超能力
 * @author Administrator
 *
 */
class FireXPower implements XPowerInterface {
	private $app;
	private $x_power_description; //超能力描述
	
	public function __construct($app) {
		$this->app = $app;
		$this->x_power_description = $this->app['config']->get('xman.xpower.firexpower.description');
	}
	
	public function getXPowerDescription() {
		return $this->x_power_description;
	}
}

?>