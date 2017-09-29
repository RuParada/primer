<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('page', 'IndexController@index');
Route::get('/', ['as'=>'home','uses'=>'IndexController@index']);
Route::get('/', ['as' => 'home','middleware' => 'rusmiddle',function () {
    return view('welcome');
}])->name('home');

*/
//echo env('APP_ENV');

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::get('/', ['as'=>'home','uses'=>'IndexController@index']);
//Route::get('/', ['as' => 'home', 'middleware' => 'auth', 'uses' => 'Dir\IndexController@auth']);

Route::get('article/{id}', 'IndexController@show')->name('articleShow');
Route::get('article_last', 'IndexController@last')->name('articleLast');

Route::get('page/add', 'IndexController@add');
Route::post('page/add', 'IndexController@store')->name('articleStore');

//laravel/form.html
Route::post('/comments', function(){
	print_r($_POST);
});

/*
Route::get('page/{id?}', function($var1=null){
	echo $var1;
})->where('id','[0-9]+');
*/

/*
Route::get('page/{cat}/{id}', function($var1){
	echo $var1;
})->where(['id' => '[0-9]+', 'cat' => '[A-Za-z0-9]+']);
*/

// Занесение в app/Providers/RouteServiceProvider
/*Route::get('page/{cat}/{id}', function($var1){
	echo $var1;
});
*/



Route::get('/info/{id}', ['as'=>'info',function ($id) {
   echo $id;
}]);

Route::get('/page/{cat}/{id}',function($var1) {
	
	echo '<pre>';
	
	echo $var1;
	//print_r($_ENV);
	//echo config('app.locale');
	//echo Config::set('app.locale','ru');
	//echo Config::get('app.locale');
	///echo env('APP_ENV');
	
	echo '</pre>';
	
})/*->where(['id'=>'[0-9]+','cat'=>'[A-Za-z]+'])*/;


//Route::match(['get','post'],'/comments',function () { print_r($_POST); });
//Route::any('/comments',function () { print_r($_POST); });


Route::group(['prefix'=>'admin/{id}'],function() {
	
	
		
	Route::get('page/create/{var}',function($id) {
		
		$route = Route::current();
		
		//echo $route->getName();
		//echo $route->getParameter('var',24);
		print_r($route->parameters());
		
	})->name('createpage');
	
	Route::get('page/edit',function() {
		echo 'page/edit<br/>';
		echo route('home');
		//return redirect()->route('home');
		return redirect()->route('info',array('id'=>25));
	});
	

});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


////////////////

Route::get('/about','Dir\BaseController@index');
Route::get('/about/{id}','Dir\BaseController@show');

//Route::resource('/core','Dir\CoreController', ['only'=>['index','show']]);
//Route::resource('/core','Dir\CoreController', ['except'=>['destroy']]);
Route::get('/core/info/{name?}','Dir\CoreController@info'); // - добавление метода в контроллер типа рессурс
Route::resource('/core','Dir\CoreController');

// Единный контроллер
// тогда в котроллере приставка get ко всем функциям которые долж. именоваться при запросе url
Route::controller('/pages', 'PagesController');

// Если нужно имя для маршрута то
Route::controller('/pages', 'PagesController', ['getAdd'=>'pages.add']); 

// middleware
Route::get('/news/{page}',['uses' => 'Dir\BaseController@index', 'as' => 'page', 'middleware' => 'rusmiddle:admin'])/*->middleware(['rusmiddle'])*/;
//Route::get('/news/{page}',['uses' => 'Dir\BaseController@index', 'as' => 'page', 'middleware' => ['rusmiddle','rusmiddle2']]);
// Если для любого запроса нужна отработка данного middleware - удалить от сюдого 'middleware' => 'rusmiddle', 
//а в Kernel protected $middleware = прописать просто путь.


