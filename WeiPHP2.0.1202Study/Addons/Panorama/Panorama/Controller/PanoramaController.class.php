<?php

namespace Addons\Panorama\Controller;
use Home\Controller\AddonsController;

class PanoramaController extends AddonsController{
	public function __construct() {
		parent::__construct ();
	}

	public function show()
	{
		$id = I ( 'get.id', 0, 'intval' );
		$this->assign ( 'id', $id );
		$this->display ( T ( 'Addons://Panorama@Panorama/show' ) );
	}

	public  function imgXml()
	{
		$id = I ( 'get.id', 0, 'intval' );
		$info = $this->getInfo($id);
		if(!$info) $this->error ( "数据不存在" );
		header("Content-type: text/xml");
		$xml = '<panorama id="">
		<view fovmode="0" pannorth="0">
		    <start pan="0" fov="70" tilt="0"/>
		    <min pan="0" fov="5" tilt="-90"/>
		    <max pan="360" fov="120" tilt="90"/>
		</view>
		<userdata title="'.$info['title'].'" datetime="2011:11:03 09:41:07" description="description" copyright="copyright" tags="tags" author="author" source="source" comment="comment" info="info" longitude="0" latitude=""/>
		<media/>
		<input tile0url="'.get_cover_url($info['picture1']).'"
		       tile1url="'.get_cover_url($info['picture2']).'"
		       tile2url="'.get_cover_url($info['picture3']).'"
		       tile3url="'.get_cover_url($info['picture4']).'"
		       tile4url="'.get_cover_url($info['picture5']).'"
		       tile5url="'.get_cover_url($info['picture6']).'"
		       tilesize="685"
		       tilescale="1.014598540145985"/>
		<autorotate speed="0.200" nodedelay="0.00" startloaded="1" returntohorizon="0.000" delay="5.00"/>
		<control simulatemass="1" lockedmouse="0" lockedkeyboard="0" dblclickfullscreen="0" invertwheel="0" lockedwheel="0" invertcontrol="1" speedwheel="1" sensitivity="8"/>
		</panorama>';
		echo $xml;
		die();
	}

	private function getInfo($id){
		if (empty ( $id ) || 0 == $id) {
			$this->error ( "ID错误" );
		}
		$map['id'] = $id;
		$map['token'] = get_token();
		$info = M ( 'Panorama' )->where ( $map )->find ();
		return $info;
	}
}
