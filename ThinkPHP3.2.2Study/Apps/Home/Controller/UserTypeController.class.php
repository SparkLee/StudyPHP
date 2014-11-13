<?php
/**
 * 这里需要注意一个地方，一旦开启了不区分URL大小写后，如果我们要访问类似UserTypeController的控制器，那么正确的URL访问应该是：// 正确的访问地址
 * http://serverName/index.php/home/user_type/index
 * // 错误的访问地址（linux环境下）
 * http://serverName/index.php/home/usertype/index
 * @author vriworks5
 *
 */
namespace  Home\Controller;
use Think\Controller;
class UserTypeController extends Controller {
    public function index() {
        echo "hello";
    }
}