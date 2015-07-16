<?php

use Libraries\XMan\FireXPower;
class XManController extends BaseController {
	public function getIndex() {
		FireXMan::showXPower();  // 烈火侠展示超能力
		FlyXMan::showXPower();   // 飞行侠展示超能力
		StormXMan::showXPower(); // 暴风女展示超能力
		IronXMan::showXPower();  // 钢铁侠展示超能力
	}
}