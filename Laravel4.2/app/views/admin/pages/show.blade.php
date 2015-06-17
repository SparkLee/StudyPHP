@extends('admin._layouts.default')

@section('main')

{{ Notification::showAll() }}
<h2>页面内容</h2>

<div id="onepage">

	<div class="title">
		<h3>{{ $page->title }}</h3>
	</div>

	<div class="info">由 {{ $author }} 发布于 {{ $page->created_at }} 最后更新 {{
		$page->updated_at }}</div>

	<div class="body">{{ $page->body }}</div>
	
	<br><br>
	<div>
	<h1>评论</h1>
	{{ Form::open(array('route' => 'admin.comments.store')) }}
	    {{ Form::hidden('commentable_type', 'Page') }}
	    {{ Form::hidden('commentable_id', $page->id) }}
		<div class="control-group">
			{{ Form::label('nickname', '姓名') }}
			<div class="controls">
				{{ Form::text('nickname' )}}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('email', '邮箱') }}
			<div class="controls">
				{{ Form::text('email' )}}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('body', '留言内容') }}
			<div class="controls">
				{{ Form::textarea('body' )}}
			</div>
		</div>
		<div class="form-actions">
			{{ Form::submit('提交', array('class' => 'btn btn-success btn-save btn-large'))}}
		</div>
		
	{{ Form::close() }}
	</div>
	<hr>
	
	<div id="comments">
		@foreach ($comments as $comment)
		    <div>作者：{{ $comment->nickname }} &nbsp;&nbsp;&nbsp; 邮箱：{{ $comment->email }}</div>
			<div>{{ $comment->body }}</div>
			{{ Form::open(array('route' => array('admin.comments.destroy', $comment->id ), 'method' => 'delete', 'data-confirm' => '你确定删除此记录吗？')) }}
				<button type="submit" class="btn btn-success">删除</button>
			{{ Form::close() }}
			<hr>
		@endforeach
	</div>

</div>

@stop
