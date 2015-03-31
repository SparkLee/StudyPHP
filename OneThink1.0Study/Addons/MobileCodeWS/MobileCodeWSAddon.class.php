<?php

namespace Addons\MobileCodeWS;
use Common\Controller\Addon;

/**
 * 国内手机号码段归属地查询插件
 * @author 李威
 */

    class MobileCodeWSAddon extends Addon{

        public $info = array(
            'name'=>'MobileCodeWS',
            'title'=>'国内手机号码段归属地查询',
            'description'=>'国内手机号码归属地查询WEB服务，提供最新的国内手机号码段归属地数据，每月更新（数据来源：WebXml.com.cn）。',
            'status'=>1,
            'author'=>'李威',
            'version'=>'0.1'
        );

        public function install(){
            return true;
        }

        public function uninstall(){
            return true;
        }

        //实现的AdminIndex钩子方法
        public function AdminIndex($param){
            $config = $this->getConfig();
        
            if(extension_loaded('curl')){
                $url = 'http://webservice.webxml.com.cn/WebServices/MobileCodeWS.asmx/getDatabaseInfo'; //获得国内手机号码归属地数据库信息
                $opts = array(
                    CURLOPT_TIMEOUT        => 5,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL            => $url,
                    CURLOPT_POST           => 1,
                    CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT'],
                    //CURLOPT_HTTPHEADER     => array('Content-type: application/x-www-form-urlencoded', 'Content-length: 100'),
                );
        
                /* 初始化并执行curl请求 */
                $ch = curl_init();
                curl_setopt_array($ch, $opts);
                $data  = curl_exec($ch);
                $error = curl_error($ch);
                curl_close($ch);
            }
            
            $this->assign('addons_config', $config);
            $this->assign('addons_data', $data);
            if($config['display']){
                $this->display('widget');
            }
        }
    }