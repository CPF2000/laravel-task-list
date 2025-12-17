<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
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
   // return view('index',['mytasks' => App\Models\Task::latest()->get()]);
   return view('index',['mytasks' => App\Models\Task::latest()->paginate(4)]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

//这边使用'tasks/{task}/edit'默认传递的参数为$task的主键id,传递给function自动根据主键id获取任务对象，获取不到对象就会返回404错误
Route::get('tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');


// Route::get('tasks/{id}/edit', function ($id) {
//     return view('edit', ['task' => App\Models\Task::findOrFail($id)]);
// })->name('tasks.edit');

// Route::get('tasks/{id}', function ($id) use($tasks) {
//     $task=collect($tasks)->firstWhere('id',$id);
//     if(!$task){
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return view('show', ['task' => $task]);
// })->name('task.show');

Route::get('tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

// Route::get('tasks/{id}', function ($id) {
//     return view('show', ['task' => App\Models\Task::findOrFail($id)]);
// })->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
  //dd($request->all());//打印请求的数据
  // 使用了TaskRequest就可以取消底下的验证了
  // $data=$request->validate([
  //   'title' => 'required|max:255',
  //   'description' => ['required'],
  //   'long_description' => ['required']
  // ]);
  // $data=$request->validated();
  // $task=new App\Models\Task();
  // $task->title=$data['title'];
  // $task->description=$data['description'];
  // $task->long_description=$data['long_description'];
  // $task->save();
  //使用Task::create($request->validated())直接根据请求的参数创建任务
  $task=Task::create($request->validated());
  return redirect()->route('tasks.show',['task' => $task->id])->with('success','任务已经成功创建');
  //with('success','任务已经成功创建') 用于在view视图中session()->has('success')判断是否有成功信息
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task,TaskRequest $request) {
  //dd($request->all());//打印请求的数据
  // $data=$request->validate([
  //   'title' => 'required|max:255',
  //   'description' => ['required'],
  //   'long_description' => ['required']
  // ]);
  // $data=$request->validated();
  // $task->title=$data['title'];
  // $task->description=$data['description'];
  // $task->long_description=$data['long_description'];
  // $task->save();
  $task->update($request->validated());//$request->validated()返回的是一个数组，直接用update方法更新任务
  return redirect()->route('tasks.show',['task' =>$task->id])->with('success','任务已经修订成功');
  //with('success','任务已经成功创建') 用于在view视图中session()->has('success')判断是否有成功信息
})->name('tasks.update');

// Route::put('/tasks/{id}', function ($id,Request $request) {
//   //dd($request->all());//打印请求的数据
//   $data=$request->validate([
//     'title' => 'required|max:255',
//     'description' => ['required'],
//     'long_description' => ['required']
//   ]);
//   $task=App\Models\Task::findOrFail($id);
//   $task->title=$data['title'];
//   $task->description=$data['description'];
//   $task->long_description=$data['long_description'];
//   $task->save();
//   return redirect()->route('tasks.show',['id' => $id])->with('success','任务已经修订成功');
//   //with('success','任务已经成功创建') 用于在view视图中session()->has('success')判断是否有成功信息
// })->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success','任务已经删除成功');
})->name('tasks.destroy');

// Route::get('/', function () {
//     return view('index',['name' => '陈萍峰']);
// });

Route::put('/tasks/{task}/toogle-complete', function (Task $task) {
    // $task->completed = !$task->completed;
    // $task->save();
    $task->toogleComplete();
    return redirect()->back()->with('success','任务状态已经更新成功');
})->name('tasks.toggle-complete');


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

