<?php

namespace Libraries\XMan\XPower;

/**
 * 超能力接口，规范所有的具体超能力类实现统一的接口，方便统一调用
 * @author Administrator
 *
 */
interface XPowerInterface {
	/**
	 * 超能力描述
	 */
	public function getXPowerDescription();
}

?>