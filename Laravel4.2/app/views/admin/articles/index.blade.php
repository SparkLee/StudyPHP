@extends('admin._layouts.default')

@section('main')
 	
 	{{ Notification::showAll() }}
 	
 	<a href="{{ URL::route('admin.articles.create') }}" class="btn btn-primary">新建</a>
 	
 	<table class="table table-stripped">
 		<thead>
 			<tr>
 				<th>#</th>
 				<th>标题</th>
 				<th>最后修改时间</th>
 				<th><i class="icon-cog"></i></th>
 			</tr>
 		</thead>
 		<tbody>
 			@foreach ($articles as $article)
 				<tr>
 					<td>{{ $article->id }}</td>
 					<td><a href="{{ URL::route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></td>
 					<td>{{ $article->updated_at }}</td>
 					<td>
 						<a href="{{ URL::route('admin.articles.edit', $article->id) }}" class="btn btn-success btn-mini pull-left">编辑</a>
 						
 						{{ Form::open(array('route' => array('admin.articles.destroy', $article->id), 'method' => 'delete', 'data-confirm' => '你确定删除此记录吗？'))}}
 							<button type="submit" class="btn btn-danger btn-mini">删除</button>
 					    {{ Form::close() }}
 					</td>
 				</tr>
 			@endforeach
 		</tbody>
 	</table>

@stop