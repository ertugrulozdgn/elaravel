<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('page2','Backend\Page2Contoller@store')->name('page2');
//Bunun bize sağladığı yarar bi link vermek istersek eğer; <a hreef="{{ Route('page2') }}"></a> dediğimizde kolaylık sağlar.

Route::get('page2', 'Backend\Page2Conttroller@indx');
Route::get('page3', 'Backend\Page3Conttroller@indx');
Route::get('page3', 'Backend\Page3Conttroller@indx');

//Bu karmaşık duruyor bunun yerine Route Group yapabiliriz.

Route::group(['namespace' => 'backend'], function (){
    Route::get('page2', 'Page2Conttroller@indx');
    Route::get('page3', 'Page3Conttroller@indx');
    Route::get('page3', 'Page3Conttroller@indx');
});

//View bir klasörün içindeyse yolu şöyle verilir,
Route::get('/backend', function (){
    return view ('Backend/index');
    //veya
    return view ('Backend.index');
    //backend/deoult daki index için;
    return view('Backend.default.index');
});


/////////////////////////////////////////////////
// Örneğin bir dizimiz var. Bu dizideki verileri foreach ile ekrana
// yazdırdık. Bu verilerin indexlerini çekmek istersek; {{$loop->index}}
//Bu verileri sıralamaka istiyorsak; {{$loop->iteration}} (1,2,3,4 diye sıralar)
//Bu veriler itersten sıralamak istersek {{$loop->remaining}} (3,2,1,0 gibi)
//Toplam dizilerin sayısını; {{$loop->count}} verir(3 tane varsa 3 )
// Sadece dizinin ilk elamanına ihtiyaç varsa; {{$loop->first}}
//Sadece son elemana ihtiyaç varsa; {{$loop->last}}
//

