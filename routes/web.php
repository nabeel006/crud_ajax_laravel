<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
//oute::get('/employees/{action}', [EmployeeController::class, 'handleAction'])
  //  ->where('action', 'create|edit|show'); // Aapke available actions ko yahaan specify karein

  //Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
  Route::get('employees', [EmployeeController::class, 'index']);

//Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('/employees/profile/{id}', [EmployeeController::class, 'profile'])->name('employees.profile');

Route::get('/users/{id}', 'UserController@show')->name('users.show');

Route::put('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/destroy/{id}', [EmployeeController::class, 'deletdestroye'])->name('employees.destroy');
Route::resource('employees', EmployeeController::class);



Route::get('/download/{id}', [EmployeeController::class, 'downloadImage']);
Route::get('/downloads/{$id}', [PostControEmployeeControllerller::class, 'downloads']);

//Route::resource('/employees','EmployeeController');