<?php

namespace App\Controllers\Admin;

use Page, Comment;
use Input, Notification, Redirect, Sentry, Str;

class CommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/comments
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/comments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/comments
	 *
	 * @return Response
	 */
	public function store()
	{
		$comment = new Comment();
		$comment->nickname = Input::get('nickname');
		$comment->email = Input::get('email');
		$comment->body = Input::get('body');
		$comment->commentable_type = Input::get('commentable_type');
		$comment->commentable_id = Input::get('commentable_id');
		$res = $comment->save();
		Notification::success ( "恭喜您，新增评论成功！" );
		
		return Redirect::route('admin.' . strtolower($comment->commentable_type) . 's.show', $comment->commentable_id );
	}

	/**
	 * Display the specified resource.
	 * GET /admin/comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo "show it.";
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/comments/{id}/edit
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
	 * PUT /admin/comments/{id}
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
	 * DELETE /admin/comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::find($id);
		$commentable_id = $comment->commentable_id;
		$comment->delete();
		
		Notification::success("评论删除成功！");
		
		return Redirect::route('admin.pages.show', $commentable_id);
	}

}