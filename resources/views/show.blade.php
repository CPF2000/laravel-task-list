@extends('layouts.app')

@section('title',$task->title)



@section('content')
    <h2>{{ $task->title }}</h2>
    <p>{{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>Created at: {{ $task->created_at }}</p>
    <p>Updated at: {{ $task->updated_at }}</p>
    <div>
        @if($task->completed)
            <span>已完成</span>
        @else
            <span>未完成</span>
        @endif
    </div>

    <div>
        <a href="{{ route('tasks.edit', ['task'=> $task->id]) }}">编辑</a>
    </div>

    <div>
        <form method="post" action="{{ route('tasks.toggle-complete', ['task'=> $task->id]) }}">
            @csrf
            @method('put')
            <button type="submit">标记为 {{ $task->completed? '未完成' : '已完成' }}</button>
        </form>
    </div>


    <div>
        <form action="{{ route('tasks.destroy', ['task'=> $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">删除</button>
        </form>
    </div>
@endsection