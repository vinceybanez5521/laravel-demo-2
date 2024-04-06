<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return 'Hello World!';
});

Route::get('/', function () {
    return '<h1>Hello World!</h1>';
});

Route::get('/home', function () {
    return 'Home';
});

Route::match(['get', 'post'], '/get-post', function () {
    return 'Route match GET and POST';
});

Route::any('/any-request', function () {
    return 'Any Request';
});

Route::view('/welcome', 'welcome');

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/redirect', '/');

// Access request headers
// dd stands for [die and dump]
Route::get('/users', function (Request $request) {
    dd($request);
    // dd($request->header());
    // dd(request()->header());
});

Route::get('/request-json', function () {
    return response()->json(['first_name' => 'Juan', 'last_name' => 'Dela Cruz']);
});

Route::get('/change-content-type', function () {
    return response('<h1>Chnange Content Type</h1>', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/download', function () {
    $path = public_path('download-installer.txt');
    $name = 'download-installer.txt';
    $headers = [
        'Content-Type: application/text-plain'
    ];
    return response()->download(
        $path,
        $name,
        $headers
    );
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']); // {id} is a Path Parameter