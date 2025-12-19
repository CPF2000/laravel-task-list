@extends('layouts.app')

@section('title', isset($task)?'Edit Task':'Create Task')

{{-- @section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection --}}

@section('content')
    <!-- {{ $errors }} 显示验证错误信息 默认是一个空数组 -->
    <form method="post" action="{{isset($task)?route('tasks.update', ['task' => $task->id]): route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{$task->title??old('title') }}" @class(['border-red-500'=>$errors->has('title')])></input>
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500'=>$errors->has('description')])>{{$task->description?? old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4"> 
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500'=>$errors->has('long_description')])>{{$task->long_description?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center gap-8">
            <button type="submit" class="btn">
                @isset($task) 
                    更新任务
                @else 
                    创建任务
                @endisset
            </button>
            <a href="{{route('tasks.index')}}" class="link">取消</a>
        </div>
    </form>
@endsection