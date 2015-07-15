<?php

namespace GuJiTech\Libraries\MyFoo;

/**
 * 
 * 参考：http://www.open-open.com/lib/view/open1425522787603.html
 * 
 * @author Administrator
 *
 */
class MyFoo {
	public function __construct($app) {
		$this->app = $app;
	}
	
	public function showApp() {
		var_dump($this->app);
	}
}