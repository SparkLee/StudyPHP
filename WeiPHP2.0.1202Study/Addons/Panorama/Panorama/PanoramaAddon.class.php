<?php

namespace Addons\Panorama;
use Common\Controller\Addon;

/**
 * 360全景插件
 * @author 王佳琦
 */

    class PanoramaAddon extends Addon{

        public $info = array(
            'name'=>'Panorama',
            'title'=>'360全景',
            'description'=>'三维全景展示全面的展示360度球型范围内的所有景致；用鼠标左键按住拖动，观看场景的各个方向；最大限度的保留了场景的真实性；给人以三维立体的空间感觉，使观者如身在其中。',
            'status'=>1,
            'author'=>'流风回雪',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/Panorama/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Panorama/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }