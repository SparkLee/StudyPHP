<?php
/**
 * 测试PHP数组的用法
 * @author SparkLee 2015/06/27 22:50
 *
 */
class ArrayTest extends TestCase {
    /**
     * 测试数组的出入栈操作
     * 1、array_pop
     * 2、array_push
     */
    public function testPushAndPop() {
        $arr1 = array();
        $result = array_push($arr1, "sparklee");
        $result = array_push($arr1, "liwei"); // 将一个或多个单元压入数组的末尾（入栈）。返回处理之后数组的元素个数。
        $this->assertEquals(2, $result);
        
        $result = array_pop($arr1);
        $this->assertEquals("liwei", $result); // 将数组最后一个单元弹出（出栈）。返回 array 的最后一个值。如果 array 是空（如果不是一个数组），将会返回 NULL 。
        
        $result = array_pop($arr1);
        $this->assertEquals("sparklee", $result); 
        
        $result = array_pop($arr1);
        $this->assertEquals(null, $result);
    }
}