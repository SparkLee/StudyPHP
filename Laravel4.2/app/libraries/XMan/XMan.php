<?php
namespace GuJiTech\Libraries\XMan;

/**
 * （超人）类
 * @author Administrator
 *
 */
class XMan {
	/**
	 * 超人所拥有的超能力
	 * @var unknown
	 */
	private $xpower;
	
	/**
	 * 可通过Laravel的IoC容器(App)将具体的超能力类注入到超人类中，使超人类具体相应的超能力
	 * @param unknown $xpower
	 */
	public function __construct($xpower) {
		$this->xpower = $xpower;
	}
	
	/**
	 * 介绍自己的超能力
	 */
	public function introduceXPower() {
		$this->xpower->xPowerDescription();
	}
}