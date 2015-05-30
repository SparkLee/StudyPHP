<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use App\Page;
use App\Article;

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
