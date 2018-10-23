<?php
use App\Jobs\SendEmail;

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



//App\User::create([
    //'name' => 'Guido',
    //'email' => 'guido@mail.com',
    //'password' => bcrypt('hola123'),
    //'role' => 'moderador'
//]);

//DB::listen(function($query){
    //echo "<pre>{$query->sql}</pre>";
//});

Route::get('job', function(){
    dispatch(new SendEmail);

    return 'Listo!';
});



Auth::routes();

Route::get('/', 'PagesController@home');//->middleware('example');

Route::get('mensajes', 'MessagesController@index');
Route::get('mensaje/create', 'MessagesController@create');
Route::post('mensaje', 'MessagesController@store');
Route::get('mensaje/{id}', 'MessagesController@show');
Route::get('mensaje/{id}/edit', 'MessagesController@edit');
Route::put('mensaje/{id}', 'MessagesController@update');
Route::delete('mensaje/{id}/delete', 'MessagesController@destroy');

Route::resource('usuarios', 'UsersController');



Route::get('/home', 'HomeController@index')->name('home');
