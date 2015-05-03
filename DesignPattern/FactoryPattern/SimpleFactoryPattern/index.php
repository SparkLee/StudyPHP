<?php
header("Content-type:text/html; charset=utf-8");

/**
 * 武器接口
 * @author vriworks5
 *
 */
interface Weapon {
	public function getinfo();
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

/**
 * 武器工厂
 * @author admin
 *
 */
class WeaponFactory {
  public function get_weapon($weapon_type) {
    switch ($weapon_type) {
      case "AK47":
        return new AK47();
        break;
      case "AR15":
        return new AR15();
        break;
      default:
        return null;
    }
  }
}

$weapon_factory = new WeaponFactory();
$soldier = new Soldier($weapon_factory->get_weapon("AK47")); //构造注入
$soldier->show_weapon_info();
echo "<br>";
$soldier = new Soldier($weapon_factory->get_weapon("AR15"));
$soldier->show_weapon_info();

