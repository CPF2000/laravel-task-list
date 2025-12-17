@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <!-- {{ $errors }} 显示验证错误信息 默认是一个空数组 -->
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title"></input>
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection