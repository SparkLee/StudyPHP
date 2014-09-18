<?php 
header("Content-type: text/html; charset=utf-8");
include('functions.php');

//var_dump($access_token); //通过AppId和AppSecret获取$access_token
//var_dump(getOpenIDs()); //获取关注者列表[返回用户OpenID数组]
//var_dump(createGroup('自动创建'));
//var_dump(getGroups());
//echo getGroupID('星标组');
//var_dump(getGroupUsers('测试组'));
//var_dump(getUserInfo());
//var_dump(getUsersInfo());
//displayUsersInfo();

$openid = 'oNCnit3qUOvddXAuJl8NdKfyh5pc';//李威OpenID
$openid2 = 'oNCnitxF9l4Hp5I11DnkePufopZM';//小路test的OpenID
$template_id = 'ioRCfg8NeRRGXmv84WM-SYyIAiTmJbpOCJrvr6iHr2Y';
$url = 'http://www.baidu.com';
$topcolor = '#32CD32';
$data = array(
    'first' => array('value' => '蓝色地标停水通知', "color" => "#173177"),
    'keyword1' => array('value' => '计划检修', "color" => "#173177"),
    'keyword2' => array('value' => '2014年9月28日8:00-18:00', "color" => "#173177"),
    'keyword3' => array('value' => '第2层和第3层', "color" => "#173177"),
    'remark' => array('value' => '因为城区道路改造需要对自来水供水管路进行停水履行，给您带来不便敬请谅解。市政公告。', "color" => "#A020F0"),
);
var_dump(sendTemplateMsg($openid, $template_id, $url, $topcolor, $data));
var_dump(sendTemplateMsg($openid2, $template_id, $url, $topcolor, $data));




