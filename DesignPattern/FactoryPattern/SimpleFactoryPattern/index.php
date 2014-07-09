<?php

/**
 * 武器接口
 * @author vriworks5
 *
 */
interface Weapon {
	static public function getinfo();
}

/**
 * AK47自动步枪
 * @author vriworks5
 *
 */
class AK47 implements Weapon {
	public function getinfo() {
      return "我是AK47自动步枪，干爆你，欧耶！";
	}
}

/**
 * AR15轻型气动式步枪
 * @author vriworks5
 *
 */
class AR15 implements Weapon {
	public function getinfo() {
	  return "我是AR15轻型气动式步枪，是不是很屌啊！";
	}
}

class Soldier {
	public $weapon;
	
	public function __construct($weapon) {
		$this->weapon = $weapon;		
	}
	
	public function show_weapon_info() {
		echo $this->weapon->getinfo();
	}
}

$soldier = new Soldier(new AK47());
$soldier->show_weapon_info();