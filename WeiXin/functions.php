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
    //return "ARUyhlJ80gEWp30bHdIRYXYTtWtYBW0nJPiU0cdg4UwNpnUelPlNUVUN99FZoPLjHVEO9qHaFIXvKNcW6SU4iQ";
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
    $result_arr = json_decode($result, true);
    $openids = $result_arr['data']['openid'];
    return $openids;
}

/**
 * 查询所有用户分组
 * @return mixed|unknown
 */
function getGroups() {
    global $access_token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/groups/get?access_token={$access_token}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $result_arr = json_decode($result, true);
    return $result_arr;
}

/**
 * 根据分组名称获取分组ID
 * @param unknown $group_name
 */
function getGroupID($group_name) {
    $groups = getGroups();
    foreach ($groups['groups'] as $group) {
        if ($group['name'] == $group_name) {
            return $group['id'];
        }
    }
}

/**
 * 查询用户所在分组的ID
 * 参考：微信公众平台开发文档/分组管理接口->http://mp.weixin.qq.com/wiki/index.php?title=%E5%88%86%E7%BB%84%E7%AE%A1%E7%90%86%E6%8E%A5%E5%8F%A3
 * @param unknown $openid
 * @return mixed
 */
function getUserGroupID($openid) {
    global $access_token;    
    $post_data = array(
        'openid' => $openid
    );
    $post_data_json = json_encode($post_data);    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/groups/getid?access_token={$access_token}");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_json);    
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($post_data_json)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/**
 * 获取用户基本信息
 * 参考：微信公众平台开发文档/获取用户基本信息(UnionID机制)->http://mp.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E7%94%A8%E6%88%B7%E5%9F%BA%E6%9C%AC%E4%BF%A1%E6%81%AF(UnionID%E6%9C%BA%E5%88%B6)
 * @param unknown $openid
 */
function getUserInfo($openid, $lang = 'zh_CN') {
    global $access_token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang={$lang}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $result_arr = json_decode($result, true);
    return $result_arr;
}

/**
 * 获取所有用户的基本信息
 * @return mixed
 */
function getUsersInfo() {
    $users_info = array();
    $openids = getOpenIDs(); //获取关注者列表[所有关注用户ID]
    foreach ($openids as $openid) {
        $users_info[] = getUserInfo($openid);
    }
    return $users_info;
}

/**
 * 展示所有用户的基本信息
 */
function displayUsersInfo() {
    $users_info = getUsersInfo();
    echo "<table style=\"width=\"200\" border=\"1\" cellspacing=\"2\" cellpadding=\"2\"\">";
    echo "<tr>";
    echo "<th>序号</th>";
    echo "<th>是否已关注</th>";
    echo "<th>用户标识</th>";
    echo "<th>用户昵称</th>";
    echo "<th>用户性别</th>";
    echo "<th>用户语言</th>";
    echo "<th>所在城市</th>";
    echo "<th>所在省份</th>";
    echo "<th>所在国家</th>";
    echo "<th>关注时间</th>";
    echo "<th>备注</th>";
    echo "<th>用户头像</th>";
    echo "</tr>";
    $cnt = 1;
    foreach ($users_info as $user_info) {
        //var_dump($user_info);
        $delimiter_index = strrpos($user_info['headimgurl'], '/'); //查找字符串中最后出现指定字符的位置
        $headimgurl = substr($user_info['headimgurl'], 0, $delimiter_index + 1);
        echo "<tr>";
        echo "<td>{$cnt}</td>";
        echo "<td>{$user_info['subscribe']}</td>";
        echo "<td>{$user_info['openid']}</td>";
        echo "<td>{$user_info['nickname']}</td>";
        echo "<td>{$user_info['sex']}</td>";
        echo "<td>{$user_info['language']}</td>";
        echo "<td>{$user_info['city']}</td>";
        echo "<td>{$user_info['province']}</td>";
        echo "<td>{$user_info['country']}</td>";
        echo "<td>{$user_info['subscribe_time']}</td>";
        echo "<td>{$user_info['remark']}</td>";
        echo "<td><img src='{$headimgurl}' style='width:48px;height:48px'></td>";
        echo "</tr>";
        $cnt++;
    }
    echo "</table>";
}

/**
 * 查询某个分组中的所有用户
 * @param unknown $group_name：分组名称
 */
function getGroupUsers($group_name) {
    $users = array();
    $group_id = getGroupID($group_name); //分组ID
    $open_ids = getOpenIDs(); //所有关注用户的OpenID
    foreach ($open_ids as $open_id) {
        $user_group_id = getUserGroupID($open_id); //用户所在分组的ID
        if($user_group_id == $group_id) {
            $users[] = $open_id;
        }
    }
    return $users;
}

/**
 * 创建用户分组
 * @param unknown $group_name：分组名称
 * @return mixed
 */
function createGroup($group_name) {
    global $access_token;
    $post_data = array(
        'group' => array(
            'name' => $group_name        
        )
    );
    $post_data_json = json_encode($post_data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/groups/create?access_token={$access_token}");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_json);
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($post_data_json)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/**
 * 给指定用户[指定用户OpenID]发送模板消息
 * 参考：https://mp.weixin.qq.com/advanced/tmplmsg?action=faq&token=1364299427&lang=zh_CN
 * 
 * @param unknown $openid 用户OpenID
 * @param unknown $template_id 模板ID
 * @param unknown $url 处理微信公众平台返回数据的第三方平台URL
 * @param unknown $topcolor 
 * @param unknown $data 传递给模板的参数值
 * @return mixed
 */
function sendTemplateMsg($openid, $template_id, $url, $topcolor, $data) {
    global $access_token;    
    $post_data = array(
        'touser' => $openid,
        'template_id' => $template_id,
        'url' => $url,
        'topcolor' => $topcolor,
        'data' => $data
    );
    $post_data_json = json_encode($post_data);    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_json);    
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($post_data_json)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}