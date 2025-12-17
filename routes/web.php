<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\RedisCaster;


// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];

Route::get('/', function ()  {
    return redirect()->route('tasks.index');
});


// Route::get('/tasks', function () use ($tasks) {
//     //dd($tasks); // 先检查数据是否正确
//     //print_r($tasks); // 再打印数据
//     return view('index',['mytasks' => $tasks]);
// })->name('tasks.index');

Route::get('/tasks', function () {
   //App\Models\Task::all() 获取所有任务
   //App\Models\Task::latest()->get() 获取最新任务
  //App\Models\Task::latest()->where('completed',true)->get() 获取已完成的任务
    return view('index',['mytasks' => App\Models\Task::latest()->get()]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');


// Route::get('tasks/{id}', function ($id) use($tasks) {
//     $task=collect($tasks)->firstWhere('id',$id);
//     if(!$task){
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return view('show', ['task' => $task]);
// })->name('task.show');

Route::get('tasks/{id}', function ($id) {
    return view('show', ['task' => App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
  //dd($request->all());//打印请求的数据
  $data=$request->validate([
    'title' => 'required|max:255',
    'description' => ['required'],
    'long_description' => ['required']
  ]);
  $task=new App\Models\Task();
  $task->title=$data['title'];
  $task->description=$data['description'];
  $task->long_description=$data['long_description'];
  $task->save();
  return redirect()->route('tasks.show',['id' => $task->id])->with('success','任务已经成功创建');
  //with('success','任务已经成功创建') 用于在view视图中session()->has('success')判断是否有成功信息
})->name('tasks.store');

// Route::get('/', function () {
//     return view('index',['name' => '陈萍峰']);
// });

Route::get('/hallo', function () {
    return  redirect()->route('myhello');
});

Route::get('/hello', function () {
    return  'Hello World';
})->name('myhello');


Route::get('/greet/{name}', function ($name) {
    return 'Hello,'.$name.'!';
});

Route::fallback(function () {
    return '<h1><strong>Page not found</strong></h1>';
});

