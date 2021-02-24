<?php
use App\Product;
use App\Category;

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

    /*
    $prod = new Product();

    $prod->nombre = 'Panetón DVieri';
    $prod->slug = 'paneton-dvieri';
    $prod->category_id = 1;
    $prod->unidad_medida = 'Caja de 6 unidades';
    $prod->descripcion_larga = 'Producto de prueba con una descripcion larga, solo para hacer pruebas.';
    $prod->estado = 'Nuevo';
    $prod->activo = 'Si';
    $prod->slider_principal = 'No';
    $prod->save();

    return $prod;
    */

    // return view('welcome');

    // $cat = Category::find(1)->products;
    // return $cat;

    return view('tienda.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');

Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}', function($ruta){
    return redirect()->route($ruta)->with('cancelar','Acción Cancelada!');
})->name('cancelar');
