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
	  /*
	  $page = Page::find(14);
	  $page2 = Page::on('mysql_211.149.209.33')->find(14);
	  var_dump($page);
	  var_dump($page2);
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
