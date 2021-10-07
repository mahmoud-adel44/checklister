<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::redirect('/', 'welcome');

Route::group(['middleware' => ['auth' , 'save_last_action_timestamp' ] ], function () {

    Route::get('/welcome', [\App\Http\Controllers\User\PageController::class, 'welcome'])->name('welcome');
    Route::get('/consultation', [\App\Http\Controllers\User\PageController::class, 'consultation'])->name('consultation');
    Route::get('/checklists/{checklist}', [\App\Http\Controllers\User\ChecklistController::class, 'show'])->name('user.checklists.show');
    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('pages', PageController::class)
            ->only(['edit', 'update']);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', ChecklistController::class);
        Route::resource('checklists', ChecklistController::class);
        Route::resource('checklists.tasks', TaskController::class);
        Route::get('users', [UserController::class , 'index'])->name('users.index');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::post('/message', [MessageController::class, 'store'])->name('message.store');
});
