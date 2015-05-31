<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','body'];
    
    // 默认（$timestamps = true） Eloquent 会自动维护数据库表的 created_at 和 updated_at 字段。$timestamps为false时，Eloquent将不再自动维护这些字段。
    public $timestamps = false;

    /**
     * 关联：一对多（一篇文章拥有多个评论）
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Comments()
    {
        return $this->hasMany('App\Comment', 'page_id', 'id');
    }

    /**
     * 定义范围查询（范围查询可以让您轻松的重复利用模型的查询逻辑。要设定范围查询，只要定义有 scope 前缀的模型方法）
     * 
     * @param unknown $query            
     */
    public function scopeTitleBeginSpark($query)
    {
        return $query->where('title', 'like', 'Spark%');
    }

    /**
     * 定义动态范围查询
     * 
     * @param unknown $query            
     * @param unknown $prefix            
     */
    public function scopeTitleBegin($query, $prefix)
    {
        return $query->where('title', 'like', $prefix . '%');
    }
}
