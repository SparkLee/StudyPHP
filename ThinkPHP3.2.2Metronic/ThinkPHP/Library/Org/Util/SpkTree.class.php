<?php

class SpkTree
{

    public static $treeList = array(); // 存放无限级分类结果
    public function create($data, $pid = 0)
    {
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                self::$treeList[] = $v;
                unset($data[$k]);
                self::create($data, $v["id"]);
            }
        }
        return self::$treeList;
    }
}