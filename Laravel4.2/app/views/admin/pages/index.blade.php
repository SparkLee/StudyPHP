@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}

    <a href="{{ URL::route('admin.pages.create') }}" class="btn btn-primary">新建</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>最后修改时间</th>
                <th><i class="icon-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
                    <td>{{ $page->updated_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-mini pull-left">编辑</a>

                        {{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'data-confirm' => '你确定删除此记录吗?')) }}
                              <button type="submit" class="btn btn-danger btn-mini">删除</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop