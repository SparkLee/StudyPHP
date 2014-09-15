<?php
include ('config.php');

$access_token = getAccessToken();

/**
 * 通过AppId和AppSecret获取$access_token
 * 参考1：获取access token->http://mp.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96access_token
 * 参考2：接口频率限制说明->http://mp.weixin.qq.com/wiki/index.php?title=%E6%8E%A5%E5%8F%A3%E9%A2%91%E7%8E%87%E9%99%90%E5%88%B6%E8%AF%B4%E6%98%8E
 *
 * 注：access_token有效期为7200秒，重复获取将导致上次获取的access_token失效。由于获取access_token的api
 * 调用次数非常有限，建议开发者全局存储与更新access_token，频繁刷新access_token会导致api调用受限，影响自身业务
 *
 * @todo 微信公众号对各接口的调用次数是有效的，而每次获取得到的access_token有效期为7200秒，故应对access_token全局存储与更新
*/
function getAccessToken()
{
    return "UgqJhbodDeDctMLWiPNW8HsdO_mcXm1et4uukTaMt-a6URQR5hhy2tj3L5ky1EGzE4K5Pc5oAMwd59aDKdqesA";
    $appid = AppId;
    $appsecret = AppSecret;
    $ch = curl_init(); // 创建一个cURL资源
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}"); // 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch); // 抓取URL并把它传递给浏览器
    curl_close($ch); // 关闭cURL资源，并且释放系统资源
    $result_arr = json_decode($result, true);
    $access_token = $result_arr['access_token'];
    return $access_token;
}

/**
 * 获取关注者列表[返回用户OpenID数组]
 * 参考：http://mp.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E5%85%B3%E6%B3%A8%E8%80%85%E5%88%97%E8%A1%A8
 *
 * @param unknown $access_token：开发者ID
 *
 */
function getOpenIDs()
{
    global $access_token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
