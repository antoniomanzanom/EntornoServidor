<?php

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
use Illuminate\Support\Facades\DB;
use App\Image;


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'UsersController@index')
                ->name('users.index');
    //ventana menú configuracion
    Route::get('/configuracion', 'UsersController@config')
                ->name('configuracion');
    Route::post('/configuracion', 'UsersController@update')
                ->name('configuracion.update');
                
    //imagenes subidas por el usuario
    Route::get('/image/save', 'ImageController@create')
                ->name('Image.create');
    Route::post('/image/save', 'ImageController@save');

    Route::get('/image/file/{filename}', 'ImageController@getImage');
    
    Route::get('/image/{id}', 'ImageController@detail')
                ->name('Image.detail');

    Route::get('/image/delete/{id}', 'ImageController@destroy')
            ->name('Image.destroy');
    //Route::get('/image/update', 'ImageController@edit')
    //          ->name('Image.edit');
    Route::post('/image/update/{id}','ImageController@update');

    //comments
    Route::get('/comment/save/{id}', 'CommentController@save');
    Route::get('/comment/destroy/{id}/{id_imagen}', 'CommentController@destroy');

    //likes
    Route::get('/like/{images_id}', 'LikeController@like')
            ->name('Like.like');
    Route::get('/likes'.'LikeController@index');

}); 

Route::post("/hola", function () {
    return "Hola a todos/as";
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});
//PRUEBA IMAGENES
Route::get('/PRUEBA', function () {
    $images = Image::all();
    foreach($images as $image){
    echo "<br><img src='".$image->image_path."'>";
    echo "<br>".$image->description;
    echo "<hr>";
    }
    //return $images;
    //return view('welcome'); 
    //return view('prueba');
    });

Route::get('/configuracion', function () {
        return view('configuracion'); 
        
    })->name('configuracion');


Auth::routes();

Route::get('/home', 'UsersController@index')->name('home')->middleware('auth');

