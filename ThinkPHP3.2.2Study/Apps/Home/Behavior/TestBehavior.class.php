<?php
/**
 * 自定义行为类，可以将这些行为绑定到某个标签位置，从而改变应用原来的执行流程
 * @author admin
 *
 */
namespace Home\Behavior;
class TestBehavior {
    // 行为扩展的执行入口必须是run
    public function run(&$params){
        echo "<p>I am a Behavior:Home\Behavior\Test</p>";
        if(C('TEST_PARAM')) {
            echo 'RUNTEST BEHAVIOR '.$params;
        }
    }
}

