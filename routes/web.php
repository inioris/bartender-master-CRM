<?php
use Illuminate\Http\Request;
use App\Recetas;
use App\Headers;
use App\Category;
use App\History;

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
    $recetas = Recetas::orderBy('id', 'desc')->simplePaginate(12);
    $post = Recetas::inRandomOrder()->simplePaginate(5);
    $headers = Headers::orderBy('id', 'desc')->simplePaginate(3);
    $category = Category::all();
    $history = History::orderBy('id', 'desc')->simplePaginate(3);
    return view('index', compact('recetas','headers','category','history','post'));

});
Route::get('/ver_recetas/{id}', function (Request $request) {
    //$recetas = Recetas::all();

    $recetas = Recetas::findOrFail($request['id']);

    return view('ver_recetas', compact('recetas'));

});

Route::resource('/recetas', 'RecetasController');

Route::resource('/apariencia', 'AparienciaController');

Route::resource('/headers', 'HeadersController');

Route::resource('/category', 'CategoryController');

Route::resource('/history', 'HistoryController');

Route::resource('/mensajes', 'ContactController');

Route::resource('/personalizar', 'PersonalizarController');
//Route::path('/updateperfil', 'PersonalizarController);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('/home');
});
