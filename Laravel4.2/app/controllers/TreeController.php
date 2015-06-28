<?php
namespace App\Controllers;

class TreeController extends \BaseController {
    public function index() {
        echo "<h1>遍历树形结构示例</h1>（Laravel当前工作环境：" . \App::environment() . "）<hr>";
        
        $area = \AreaModel::all()->toArray();
        //var_dump($area);
        
        $this->traverseTreeRecursively($area);
    }
    
    /**
     * 递归遍历树形结构
     * @param unknown $data 树形结构数据
     */
    public function traverseTreeRecursively($data) {
        // 树形结构当前层数
        $layer = 0;
        
        // 取树形结构的顶层数据
        $result = \AreaModel::where('parent_id', '=', 0)->get()->toArray();
        
        // 若树形结构的顶层数据不为空，则开始显示树形结构数据
        if (!empty($result)) {
            $this->showTreeMenu($result, $layer);
        }
    }
    
    public function showTreeMenu($data, $layer) {
        foreach ($data as $d) {
            // 为了更加清晰的体现树形结构，故在每个子节点前加相应的“-”用来区分不同的层
            $line_prefix = "";
            for($i = 0; $i < $layer; $i++) {
                $line_prefix .= "-----";
            }
            
            echo "<p>{$line_prefix}{$d['name']}</p>";
            
            $result = \AreaModel::where('parent_id', '=', $d['id'])->get()->toArray();
            
            if (!empty($result)) {
                $this->showTreeMenu($result, $layer + 1);
            }
        }
    }
}