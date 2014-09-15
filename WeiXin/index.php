<?php 
include('functions.php');

//var_dump(getAccessToken()); //通过AppId和AppSecret获取$access_token
var_dump(getOpenIDs()); //获取关注者列表[返回用户OpenID数组]

//array(3) { [0] => string(28) "oEUwds822-jRLfoXrEGjw3Qj3NNU" [1] => string(28) "oEUwds_64BhIwy1ehQpa1ggCHNGU" [2] => string(28) "oEUwds0FACqw2ZqmQA9zR7rI0ZWw" }
$openid = 'oEUwds_64BhIwy1ehQpa1ggCHNGU';
$template_id = '252IbbjRF7DxDCsMvXpYVzk2HnGKCl5MN2HNIQ5S4AM';
$url = '';
$topcolor = '#FF0000'; 
$data = array(
    'first' => array('value' => '*此处是标题*', "color" => "#173177"),
    'schedule' => array('value' => '起床啦', "color" => "#173177"),
    'time' => array('value' => '每天6点', "color" => "#173177"),
    'remark' => array('value' => '明天6点继续', "color" => "#173177"),
);
var_dump(sendTemplateMsg($openid, $template_id, $url, $topcolor, $data));
