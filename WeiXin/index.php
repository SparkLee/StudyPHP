<?php

/**
 * 获取关注者列表
 * 
 * 参考：http://mp.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E5%85%B3%E6%B3%A8%E8%80%85%E5%88%97%E8%A1%A8
 */
include('config.php');

function getOpenIDs()
{
    $ch = curl_init(); // 创建一个cURL资源
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/user/get?access_token={TOKEN}"); // 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch); // 抓取URL并把它传递给浏览器
    curl_close($ch); // 关闭cURL资源，并且释放系统资源
}