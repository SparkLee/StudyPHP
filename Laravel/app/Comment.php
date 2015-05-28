<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
  // 批量赋值：guarded 与 fillable 相反，是作为「黑名单」而不是「白名单」：
  protected $fillable = [
      'nickname', 
      'email', 
      'content', 
      'page_id'
  ];
  protected $guarded = [
      'website'
  ];
}
