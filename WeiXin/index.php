<?php 
header("Content-type: text/html; charset=utf-8");
include('functions.php');

//var_dump(getAccessToken()); //通过AppId和AppSecret获取$access_token
//var_dump(getOpenIDs()); //获取关注者列表[返回用户OpenID数组]

$openid = 'oNCnit3qUOvddXAuJl8NdKfyh5pc';//李威OpenID
$openid2 = 'oNCnitxF9l4Hp5I11DnkePufopZM';//小路test的OpenID
$template_id = '252IbbjRF7DxDCsMvXpYVzk2HnGKCl5MN2HNIQ5S4AM';
$url = 'http://www.baidu.com';
$topcolor = '#32CD32'; 
$data = array(
    'first' => array('value' => '*此处是标题*', "color" => "#173177"),
    'schedule' => array('value' => '起床啦', "color" => "#173177"),
    'time' => array('value' => '每天6点', "color" => "#173177"),
    'remark' => array('value' => ' 明天6点继续', "color" => "#A020F0"),
);
var_dump(sendTemplateMsg($openid, $template_id, $url, $topcolor, $data));
var_dump(sendTemplateMsg($openid2, $template_id, $url, $topcolor, $data));

//var_dump(createGroup('自动创建'));
//var_dump(getGroups());
//echo getGroupID('星标组');
//var_dump(getGroupUsers('测试组'));
//var_dump(getUserInfo());
//var_dump(getUsersInfo());
//displayUsersInfo();


