@extends('layouts.app')

@section('title', 'Task List')

<!-- <h1>Hello Index!</h1> -->
 

@section('content')
<nav class="mb-4">
    <a class="link" href="{{ route('tasks.create') }}">添加任务</a>
</nav>

<div >
    @if (count($mytasks))
        @foreach ($mytasks as $task)
            <div>
                <a @class(['line-through'=> $task->completed]) href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @endforeach
    @else
        <h2>No Tasks Yet</h2>
    @endif
</div>

@if($mytasks->count())
    <nav class="mb-4" aria-label="任务分页">
        {{ $mytasks->links('custom') }}
    </nav>
@endif

@endsection

<!-- <div>
    @forelse ($mytasks as $task)
        <p>{{ $task->long_description }}</p>
    @empty
        <h2>No Tasks Yet</h2>
    @endforelse
</div> -->
@isset($name2)
    <p>My name is {{ $name2 }}</p>
@endisset
<p>Today is {{ date('l, F jS Y') }}</p>

