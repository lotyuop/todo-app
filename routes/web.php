<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {

 Route::get('/dashboard', [TaskController::class,'alltask'])->name('dashboard');


Route::post('/add/new/task',[TaskController::class,'createtask'])->name('addtask');
Route::get('/create/task',function(){
    return view('addtask');
})->name('createtsk');

Route::get('/view/one/task/{task}',function (\App\Models\Task $task){
       return view('viewtask',['task'=>$task]);
})->name('viewone');

Route::get('/view/update/status/{id}/{status}',[TaskController::class,'changestatus'])->name('changestatus');

Route::get('/task/delete/{id}',[TaskController::class,'droptask'])->name('droptask');





});
