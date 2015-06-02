<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public function imageable()
    {
        //return $this->morphTo();
        
        // 如果morphTo函数不传任何参数，则默认的$name即为当前函数名（即：imageable）。如果传递了第一个参数，则$name就取第一个参数。
        // 如果第二和第三个参数未传，则自动根据$name生成默认的$type和$id。如果传递了第二和第三个参数，则第一个参数$name随便传递什么值都可以，
        // 因为它反正会被忽略掉的。
        // 参考函数Illuminate\Database\Eloquent\Model::morphTo(string $name, string $type, string $id) 的方法体。
        return $this->morphTo('imageable', 'imageable_type', 'imageable_id');
    }
}
