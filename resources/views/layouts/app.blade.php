<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    @yield('styles')
</head>
<body>
    
    <h1>@yield('title')</h1>
    <div>
        <!-- 闪现消息 根据web.php中的redirect()->route('tasks.show',['id' => $task->id])->with('success','任务已经成功创建');中的with创建 -->
        @if(session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>