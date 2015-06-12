<?php

namespace App\Controllers\Admin;

use Page;
use Input, Notification, Redirect, Sentry, Str;
use App\Services\Validators\PageValidator;

class PagesController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 * GET /admin/pages
	 *
	 * @return Response
	 */
	public function index() {
		return \View::make ( 'admin.pages.index' )->with ( 'pages', Page::all () );
	}
	
	/**
	 * Show the form for creating a new resource.
	 * GET /admin/pages/create
	 *
	 * @return Response
	 */
	public function create() {
		return \View::make ( 'admin.pages.create' );
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /admin/pages
	 *
	 * @return Response
	 */
	public function store() {
		$validation = new PageValidator ();
		
		if ($validation->passes ()) {
			$page = new Page ();
			$page->title = Input::get ( 'title' );
			$page->body = Input::get ( 'body' );
			$page->user_id = Sentry::getUser ()->id;
			$page->save ();
			
			Notification::success ( '新增页面成功！' );
			
			return Redirect::route ( 'admin.pages.edit', $page->id );
		}
		
		return Redirect::back ()->withInput ()->withErrors ( $validation->errors );
	}
	
	/**
	 * Display the specified resource.
	 * GET /admin/pages/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function show($id) {
		return \View::make ( 'admin.pages.show' )->with ( 'page', Page::find ( $id ) )->withAuthor ( Sentry::findUserById ( Page::find ( $id )->user_id )->email );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/pages/{id}/edit
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function edit($id) {
		return \View::make ( 'admin.pages.edit' )->with ( 'page', Page::find ( $id ) );
	}
	
	/**
	 * Update the specified resource in storage.
	 * PUT /admin/pages/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function update($id) {
		$validation = new PageValidator ();
		
		if ($validation->passes ()) {
			$page = Page::find ( $id );
			$page->title = Input::get ( 'title' );
			$page->body = Input::get ( 'body' );
			$page->user_id = Sentry::getUser ()->id;
			$page->save ();
			
			Notification::success ( '更新页面成功！' );
			
			return Redirect::route ( 'admin.pages.edit', $page->id );
		}
		
		return Redirect::back ()->withInput ()->withErrors ( $validation->errors );
	}
	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/pages/{id}
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		$page = Page::find ( $id );
		$page->delete ();
		
		Notification::success ( "删除成功（删除记录ID为：($id)）！" );
		return Redirect::route ( 'admin.pages.index' );
	}
}