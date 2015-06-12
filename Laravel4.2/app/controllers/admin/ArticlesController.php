<?php

namespace App\Controllers\Admin;

use Article;
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Notification;
use App\Services\Validators\ArticleValidator;
use App\Services\Validators\Validator;

class ArticlesController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 * GET /admin/articles
	 *
	 * @return Response
	 */
	public function index() {
		return View::make ( 'admin.articles.index' )->with ( 'articles', Article::all () );
	}
	
	/**
	 * Show the form for creating a new resource.
	 * GET /admin/articles/create
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('admin.articles.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /admin/articles
	 *
	 * @return Response
	 */
	public function store() {
		$validation = new ArticleValidator();
		
		if ($validation->passes()) {
			$page = new Article();
			$page->title = Input::get('title');
			$page->body = Input::get('body');
			$page->user_id = Sentry::getUser()->id;
			$page->save();
			
			Notification::success("新增文章成功！当前用户ID为{$page->user_id }");
			return Redirect::route('admin.articles.index');
		}
		
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}
	
	/**
	 * Display the specified resource.
	 * GET /admin/articles/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function show($id) {
		return View::make('admin.articles.show')->with('article', Article::find($id))->withAuthor(Sentry::findUserById(Article::find($id)->user_id)->email);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/articles/{id}/edit
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function edit($id) {
		return View::make('admin.articles.edit')->with('article', Article::find($id));
	}
	
	/**
	 * Update the specified resource in storage.
	 * PUT /admin/articles/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function update($id) {
		$validation = new ArticleValidator ();
		
		if ($validation->passes ()) {
			$article = Article::find ( $id );
			$article->title = Input::get ( 'title' );
			$article->body = Input::get ( 'body' );
			$article->user_id = Sentry::getUser ()->id;
			$article->save ();
			
			Notification::success ( '更新页面成功！' );
			
			return Redirect::route ( 'admin.articles.index', $article->id );
		}
		
		return Redirect::back ()->withInput ()->withErrors ( $validation->errors );
	}
	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/articles/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		$article = Article::find ( $id );
		$article->delete ();
		
		Notification::success ( "删除成功（删除记录ID为：{$id}）！" );
		return Redirect::route ( 'admin.articles.index' );
	}
}