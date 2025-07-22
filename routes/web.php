<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\PreventDeveloper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::name('frontend.')->middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('frontend.pages.generalHomePage');
    })->name('generalHome');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

});

Route::name('frontend.')->middleware(PreventDeveloper::class)->group(function () {

    Route::get('/home', function () {
        return view('frontend.pages.home');
    })->name('home');

    //User Routes//...

    Route::get('/deleteUser/{id}', [UserController::class, 'delete'])->name('deleteUser');

    Route::get('/showUsers', [UserController::class, 'show'])->name('showUsers');

    Route::get('/updateUser/{id}', [UserController::class, 'edit'])->name('updateUser');

    Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('updateUser.store');

    Route::get('/createUser', [UserController::class, 'showCreateUserForm'])->name('createUser.form');

    Route::post('/createUser', [UserController::class, 'createUser'])->name('createUser');

    //Project Routes//...

    Route::get('/deleteProject/{id}', [ProjectsController::class, 'delete'])->name('deleteProject');

    Route::get('/showProjects', [ProjectsController::class, 'show'])->name('showProjects');

    Route::get('/updateProject/{id}', [ProjectsController::class, 'edit'])->name('updateProject');

    Route::put('/updateProject/{id}', [ProjectsController::class, 'update'])->name('updateProject.store');

    Route::get('/createProject', [ProjectsController::class, 'showCreateProjectForm'])->name('createProject.form');

    Route::post('/createProject', [ProjectsController::class, 'createProject'])->name('createProject');

    Route::get('/projectDetails/{id}', [ProjectsController::class, 'showProjectDetails'])->name('projectDetails');

    //Task Routes//...

    Route::get('/deleteTask/{id}', [TasksController::class, 'delete'])->name('deleteTask');

    Route::get('/showTasks', [TasksController::class, 'show'])->name('showTasks');

    Route::get('/updateTask/{id}', [TasksController::class, 'edit'])->name('updateTask');

    Route::put('/updateTask/{id}', [TasksController::class, 'update'])->name('updateTask.store');

    Route::get('/createTask', [TasksController::class, 'showCreateTaskForm'])->name('createTask.form');

    Route::post('/createTask', [TasksController::class, 'createTask'])->name('createTask');

    Route::get('/taskDetails/{id}', [TasksController::class, 'showTaskDetails'])->name('taskDetails');

    Route::post('/assign-task', [TasksController::class, 'assignTask'])->name('assign.task');

    //Logout Route//...

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::name('frontend.')->group(function () {

    Route::get('/home', function () {
        return view('frontend.pages.home');
    })->name('home');

    Route::get('/showAssignedTasks', [TasksController::class, 'showAssignedTasks'])->name('showAssignedTasks');

    Route::get('/showAssignedTaskDetails/{id}', [TasksController::class, 'showAssignedTaskDetails'])->name('showAssignedTaskDetails');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

//