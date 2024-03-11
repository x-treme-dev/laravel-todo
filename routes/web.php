<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Вывести панель с задачами
 */

// по этому маршруту выведем шаблон tasks.blade.php
Route::get('/', function () {
           $tasks = Task::orderBy('created_at', 'asc')->get();

            return view('tasks', [
              'tasks' => $tasks
            ]);
});

/**
 * Добавит новую задачу
 */

Route::post('/task', function(Request $request){
     // проверить данные из формы
           $validator = Validator::make($request->all(), [
           'name' => 'required|max:255',
         ]);
         // если данные не корректные, то выводим ошибку
         if ($validator->fails()) {
           return redirect('/')
             ->withInput()
             ->withErrors($validator);
         }
         
            $task = new Task;
            $task->name = $request->name;
            $task->save();

            return redirect('/');
});


/**
 * Удалить задачу
 */

Route::delete('/task/{task}', function(Task $task){
     $task->delete();

    return redirect('/');
});
