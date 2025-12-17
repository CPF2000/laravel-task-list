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
        <form action="{{ route('tasks.destroy', ['task'=> $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">删除</button>
        </form>
    </div>
@endsection