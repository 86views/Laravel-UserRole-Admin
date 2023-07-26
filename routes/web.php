<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Student\TimetableController;
use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Admin;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});







Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');  

    Route::middleware('role:1')
         ->prefix('student')
        ->name('student.')
        ->group(function () {
            Route::get('/timetable', [Student\TimetableController::class, 'index'])
                ->name('timetable');
                Route::get('tasks', [Student\TaskController::class, 'index'])->name('tasks.index');
                Route::get('tasks/create', [Student\TaskController::class, 'create'])->name('tasks.create');
                Route::post('tasks', [Student\TaskController::class, 'store'])->name('tasks.store');
                Route::get('tasks/{task}', [Student\TaskController::class, 'show'])->name('tasks.show');
                Route::get('tasks/{task}/edit', [Student\TaskController::class, 'edit'])->name('tasks.edit');
                Route::put('tasks/{task}', [Student\TaskController::class, 'update'])->name('tasks.update');
                Route::delete('tasks/{task}', [Student\TaskController::class, 'destroy'])->name('tasks.destroy');   
                          

            //  Route::get('/profile', [ProfiletableController::class, 'index'])
            //    ->name('profile');        
        });

    Route::middleware('role:2')   
         ->prefix('teacher')
        ->name('teacher.')
        ->group(function () {
            Route::get('/timetable', [Teacher\TimetableController::class, 'index'])
                ->name('timetable');
                Route::get('tasks', [Teacher\TaskController::class, 'index'])->name('tasks.index');
                Route::get('tasks/create', [Teacher\TaskController::class, 'create'])->name('tasks.create');
                Route::post('tasks', [Teacher\TaskController::class, 'store'])->name('tasks.store');
                Route::get('tasks/{task}', [Teacher\TaskController::class, 'show'])->name('tasks.show');
                Route::get('tasks/{task}/edit', [Teacher\TaskController::class, 'edit'])->name('tasks.edit');
                Route::put('tasks/{task}', [Teacher\TaskController::class, 'update'])->name('tasks.update');
                Route::delete('tasks/{task}', [Teacher\TaskController::class, 'destroy'])->name('tasks.destroy');   
                       
           
            //  Route::get('/profile', [ProfiletableController::class, 'index'])
            //    ->name('profile');        
        });

        Route::middleware('role:3')   
        ->prefix('admin')
       ->name('admin.')
       ->group(function () {
           Route::get('/users', [Admin\UserController::class, 'index'])
               ->name('users');

              Route::get('tasks', [Admin\TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [Admin\TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [Admin\TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{task}', [Admin\TaskController::class, 'show'])->name('tasks.show');
Route::get('tasks/{task}/edit', [Admin\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{task}', [Admin\TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [Admin\TaskController::class, 'destroy'])->name('tasks.destroy');   
          

               
       });

    //    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });
});

require __DIR__ . '/auth.php';
