@extends('layouts.app')

@section('title', '创建任务')

@section('content')
    <!-- 使用通用form表单模板 -->
     @include('form')

    <!-- {{ $errors }} 显示验证错误信息 默认是一个空数组 -->
    <!-- <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"></input>
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form> -->
@endsection