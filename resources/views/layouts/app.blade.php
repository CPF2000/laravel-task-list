<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    @yield('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
     <!-- <script src="https://cdn.tailwindcss.com"></script> -->
     {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    {{-- blade-formatter-disable --}}
    {{-- <style type="text/tailwindcss">
        .btn{
            @apply bg-blue-500 text-white font-bold py-2 px-4 rounded;
        }
    </style> --}}
    {{-- blade-formatter-enable --}}
    {{-- @vite('resources/js/alpine-test.js') --}}
</head>


<body class="container mx-auto mt-10 max-w-2xl">

     <!-- 添加调试信息 -->
    {{-- <div id="debug" x-data x-text="'Alpine loaded: ' + (typeof Alpine !== 'undefined')"></div> --}}

    <h1 class="mb-4 text-3xl" >@yield('title')</h1>
    <div x-data="{flash: true}">
        <!-- 闪现消息 根据web.php中的redirect()->route('tasks.show',['id' => $task->id])->with('success','任务已经成功创建');中的with创建 -->
        @if(session()->has('success'))
           {{--  <div>{{ session('success') }}</div> --}}
        <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
            <strong class="font-bold">Success!</strong>
            <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" @click="flash=false" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        @endif 
        @yield('content')
    </div>
</body>
</html>