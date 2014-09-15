<?php 
include('functions.php');

var_dump(getAccessToken()); //通过AppId和AppSecret获取$access_token
var_dump(getOpenIDs()); //获取关注者列表[返回用户OpenID数组]
