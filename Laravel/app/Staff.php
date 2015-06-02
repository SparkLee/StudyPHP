<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {

	public function photos() {
	    //return $this->morphMany('App\Photo', 'imageable');
	    
	    // morphMany的第二个参数$name只是用来生成默认的$type和$id的。如果指定了第三个参数$type和第四个参数$id，则第二个参数随意写成啥都可以。
	    // 参考：Illuminate\Database\Eloquent\Model::getMorphs(string $name, string $type, string $id) - 此函数在morphMany函数中会用到。
	    return $this->morphMany('App\Photo', 'imageable', 'imageable_type', 'imageable_id');
	}

}
