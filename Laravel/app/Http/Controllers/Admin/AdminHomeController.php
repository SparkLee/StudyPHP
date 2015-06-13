<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use App\Page;
use App\Article;
use App\User;
use App\Phone;
use App\Comment;
use App\Role;
use App\Country;
use App\Staff;
use App\Order;
use App\Photo;

class AdminHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  header("Content-type: text/html; charset=utf-8");
	  
	  // 根据主键获取某条记录数据
	  //$page = Page::find(0); var_dump($page->title); exit;
	  
	  //  根据主键获取某条记录数据（不到模型数据时抛出异常）
	  //  注：需要引用模型未找到异常类-use Illuminate\Database\Eloquent\ModelNotFoundException;
	  /*
	  try {
	    $page = Page::findOrFail(14);
	    var_dump($page->title);
	    exit;
	  } catch (ModelNotFoundException $e) {
	    echo $e->getMessage();
	    exit;
	  }	  
	  
	  try {
	  $page = Page::where('title', 'like', '%Laravel=%')->firstOrFail();
	  var_dump($page->title);
	  exit;
	  } catch (ModelNotFoundException $e) {
	  echo $e->getMessage();
	  exit;
	  } */
	  
	  // 指定查询条件并获取前10条记录数据
	  /*
	  $pages = Page::where('title', 'like', '%Laravel%')->take(10)->get();
	  foreach ($pages as $p) {
	    var_dump($p->title);
	  }
	  exit; */
	  
	  // 获取满足指定查询条件的记录条数
	  /*
	  $cnt_pages = Page::where('title', 'like', '%Laravel%')->count();
	  echo $cnt_pages;
	  exit; */
	  
	  // 如果没办法使用流畅接口产生出查询语句，也可以使用 whereRaw 方法
	  /*
	  $cnt_pages = Page::whereRaw('title like ? and body like ?', ['%Laravel%', '%有力保障%'])->count();
	  echo $cnt_pages;
	  exit; */
	  
	  // 拆分查询：如果您要处理非常多（数千条）Eloquent 查询结果，使用 chunk 方法可以让您顺利工作而不会消耗大量内存
	  /* @todo 没看懂是神马意思
	  Page::chunk(1, function($pages) {
	      var_dump($pages);
	  });
	  exit; */
	  
	  // 指定查询时连接数据库
	  /* $page = Page::find(14);
	  $page2 = Page::on('mysql_211.149.209.33')->find(14);
	  var_dump($page);
	  var_dump($page2);
	  exit;  */
	  
	  // 储存新的模型数据（使用save方法）
	  /* $page = new Page;
	  $page->title = "储存新的模型数据（使用save方法）-我是标题";
	  $page->body = "储存新的模型数据（使用save方法）-我是内容";
	  $page->save();
	  echo "新增记录的ID为：" . $page->id;
	  exit; */
	  
	  // 储存新的模型数据（使用create方法。注：新增前，需要先在模型类里设定好 fillable 或 guarded 属性，因为 Eloquent 默认会防止批量赋值）
	  /* $page = Page::create(['title' => "储存新的模型数据（使用create方法）-我是标题", 'body' => "储存新的模型数据-我是内容"]);
	  echo "新增记录的ID为：" . $page->id;
	  exit; */
	  // 以属性找记录，若没有则新增并取得新的实例
	  /* $page = Page::firstOrCreate(['title' => '储存新的模型数据（使用firstOrCreate方法）-我是标题']);
	  $page = Page::firstOrNew(['title' => '储存新的模型数据（使用firstOrNew方法）-我是标题']); //@todo 此方法似乎无效
	  echo "新增记录的ID为：" . $page->id;
	  exit; */
	  
	  // 更新取出的模型
	  /* $page = Page::find(27);
	  $page->body = "速度太慢，我想屎啊。";
	  $page->save();
	  echo "更新记录的ID为：" . $page->id;
	  exit; */

	  // 结合查询语句，批次更新模型
	  /* $affectedRows = Page::where('title', 'like', '%储存%')->update(['title' => '就是这么屌']);
	  echo "更新的记录数：" . $affectedRows;
	  exit; */
	  
	  // 删除模型
	  /* $page = Page::find(70);
	  $page->delete();
	  exit; */
	  // 按主键值删除模型
	  //Page::destroy(68);
	  //Page::destroy(13, 26);
	  //Page::destroy([28, 29]);
	  //exit;
	  // 结合查询语句批次删除模型
	  /* $affectedRows = Page::where('title', 'like', '%储存%')->delete();
	  echo "删除的记录数：" . $affectedRows;
	  exit; */
	  // 只更新模型的时间戳（updated_at）
	  /* $page = Page::find(68);
	  $page->touch();
	  exit; */
	  
	  // 强制查询软删除数据
	  /* $page = Page::where('title', '<>', '')->get();
	  $pages2 = Page::withTrashed()->get();
	  echo "记录数（不包括被软删除的数据）：" . $page->count(); echo "<br>";
	  echo "记录数（包括被软删除的数据）：" . $pages2->count();
	  exit; */
	  
	  // 只查询被软删除的模型数据
	  /* $pages = Page::onlyTrashed()->get();
	  echo "被软删除的记录数：" . $pages->count();
	  exit; */
	  
	  // 恢复被软删除的模型数据
	  /* $pages = Page::onlyTrashed()->restore();
	  exit; */
	  
	  // 强制删除模型数据（当开启了软删除功能SoftDeletingTrait后）
	  /* $page = Page::find(71);
	  $page->forceDelete();
	  exit; */
	  
	  // 使用（动态）范围查询
	  /* $pages = Page::titlebeginspark()->get();
	  $pages = Page::titlebegin('储存')->withTrashed()->get();
	  var_dump($pages);
	  exit; */

	  // 关联：一对一
	  /* $user = User::find(1);
	  $phone = $user->phone;
	  var_dump($phone);
	  exit; */
	  
	  // 关联：相对关联 -> 一对一
	  /* $phone = Phone::find(1);
	  $user = $phone->user;
	  var_dump($user);
	  exit; */
	  
	  // 关联：一对多
	  /* $page = Page::find(74);
	  $comments = $page->Comments;
	  var_dump($comments);
	  exit; */
	  
	  // 关联：相对关联 -> 一对多
	  /* $comment = Comment::find(4);
	  $page = $comment->page;
	  var_dump($page);
	  exit; */
	  
	  // 关联：多对多
	  /* $user  = User::find(4);
	  $role = Role::find(1);
	  $roles = $user->roles;
	  $users = $role->users;
	  var_dump($roles);
	  //var_dump($users);
	  exit; */
	  
	  // 关联：Has Many Through 远层一对多关联
	  /* $country = Country::find(1);
	  $counties = $country->counties;
	  var_dump($counties);
	  exit; */
	  
	  // 关联：多态关联（一对一，一对多的多态关联）
	  // 【此示例的应用场景为：员工staff和订单order都有相应的图片photo，他们的图片都存放在photos表中，用imageable_type来区分到底是员工的还是订单的图片】
	  // 【1、参考：源码分析 - PHPHub 的 Vote 功能与 Laravel 多态数据关系 (Polymorphic Relationship)：https://phphub.org/topics/29】
	  // 【2、注：数据库中imageable_type字段必须是类命令空间全路径，如：App\Order，不能直接写成Order，否则会提示类Order找不到】
	  // 取得多态关联对象
	  /* $staff = Staff::find(2);
	  $photos = $staff->photos;
	  echo "<pre>"; var_dump($photos); echo "</pre>"; 
	  exit; */
	  //取得多态关联对象的拥有者
	  /* $photo = Photo::find(3);
	  $imageable = $photo->imageable;
	  echo "<pre>"; var_dump($imageable); echo "</pre>"; 
	  exit; */

	  // 关联：多态的多对多关联
	  /**
	   * 应用场景：一篇文章或一个视频可能打多个标签；同一个标签可以同时属于文章或视频。
	   * 
	   * 一：创建模型及相应的\database\migrations，并此目录下的相应文件中完善数据表的字段定义
	   * 1、创建文章模型Models\Blog\BlogPost：php artisan make:model Models\Blog\BlogPost
	   * 2、创建视频模型Models\Blog\BlogVideo：php artisan make:model Models\Blog\BlogVideo
	   * 3、创建标签模型Models\Blog\BlogTag：php artisan make:model Models\Blog\BlogTag
	   * 4、创建关联模型Models\Blog\BlogTaggable：php artisan make:model Models\Blog\BlogTaggable
	   * 
	   * 三：迁移数据库（自动创建数据表）：php artisan migrate
	   * 注：如果要重新迁移某个已经迁移过的数据表，可以删除migrations表中相应的迁移历史记录，再执行php artisan migrate即可。
	   *     可以通过命令php artisan migrate:status查看\database\migrations目录下哪些个数据迁移文件未曾迁移过。
	   * 
	   * 四：新建相应的\database\seeds并添加相应的记录数据
	   * 
	   * 五：填充数据表（自动填充数据表记录数据）：
	   * 
	   */
	  // 【参数：http://www.golaravel.com/laravel/docs/5.0/eloquent/#relationships】
	  
	  $data = array(
	      'pages' => Page::all(),
	  );
	  return view('admin.index', $data);
	  //return view('admin.index')->withPages(Page::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
