@extends('layouts.app') @section('title',$task->title) @section('content')
<div class="mb-4">
    <a
        class="link"
        href="{{ route('tasks.index') }}"
        >←后退到任务列表</a
    >
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@if($task->long_description)
<p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
@endif

<p class="mb-4 text-sm text-slate-500">
    创建于 {{ $task->created_at->diffForHumans() }} · 更新于
    {{ $task->updated_at->diffForHumans() }}
</p>
<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">已完成</span>
    @else {{-- <span class="font-medium text-red-500">未完成</span> --}} @endif
</p>

<div class="flex gap-2">
    <a class="btn" href="{{ route('tasks.edit', ['task'=> $task->id]) }}"
        >编辑</a
    >

    <form
        method="post"
        action="{{ route('tasks.toggle-complete', ['task'=> $task->id]) }}"
    >
        @csrf @method('put')
        <button class="btn" type="submit">
            标记为 {{ $task->completed? '未完成' : '已完成' }}
        </button>
    </form>

    <form
        action="{{ route('tasks.destroy', ['task'=> $task->id]) }}"
        method="post"
    >
        @csrf @method('delete')
        <button class="btn" type="submit">删除</button>
    </form>
</div>
@endsection
