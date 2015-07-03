<?php

class ValidatorTestController extends BaseController {
    public function getIndex() {
        $data_test = array(
                //'name' => 'li',
                'age' => 2,
                'email' => 'liwei#jingzhiheng.com',
        );
        $rules = array(
                'name' => 'required|min:2',
                'age' => 'required',
                'email' => 'required|email',
        );
        $validator = Validator::make($data_test, $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            //echo "<pre>"; var_dump($messages); echo "</pre>";
            
            $failed = $validator->failed();
            //echo "<pre>"; var_dump($failed); echo "</pre>";
            
            /**
             * 使用错误信息
             */
            //echo $messages->first('name'); // 返回指定字段的第一个错误信息
            //echo $messages->first('name', '<del>:message</del>'); // 错误信息格式化输出
            
            //echo "<pre>"; var_dump($messages->get('name')); echo "</pre>"; // 返回指定字段的所有错误信息
            
            //echo "<pre>"; var_dump($messages->all()); echo "</pre>"; // 返回所有字段的所有错误信息
            //foreach($messages->all('<p>:message</p>') as $message) { // 查看所有错误信息并以格式化输出
            //    echo $message;
            //}
            
            //echo ($messages->has('name'))? "指定字段有错误信息" : "万事大吉，卵事儿没有"; // 判断指定字段是否有错误信息
            
            return View::make('validator.index');
        }
    }
    
    public function getLogin() {
        return View::make('validator.login');
    }
    
    public function postLogin() {
        $rules = array(
                'uname' => 'required|min:2',
                'uage' => 'required',
                'uemail' => 'required|email',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
            
            //return Redirect::back()->withErrors($validator, 'login'); // 命名错误清单（未命名时为default）
        }
    }
    
}
