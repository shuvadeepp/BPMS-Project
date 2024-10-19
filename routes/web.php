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
    return view('website/index');
}); 
// Route::get('/Application', function () {
//     return view('portal.Application.admin-login');
// }); 

/* ****************************** PORTAL ROUTE ********************************** */
// Route::group(['middleware' => 'auth.jwt'], function () {
Route::match(['get', 'post'], 'Application/{controller}/{action?}/{params?}', function ($controller, $action = 'index', $params = '') {
    // echo $controller;exit;
    $params = explode('/', $params);
    $app = app();
    $controller = $app->make("\App\Http\Controllers\Application\\" . ucwords($controller) . 'Controller',['action' => $action]);
    return $controller->callAction($action, $params);
});
// }); 
Route::match(['get', 'post'], 'Portal/Application/{controller}/{action?}/{params?}', function ($controller, $action = 'index', $params = '') {
    // echo $controller;exit;
    $params = explode('/', $params);
    $app = app();
    $controller = $app->make("\App\Http\Controllers\Application\\" . ucwords($controller) . 'Controller',['action' => $action]);
    return $controller->callAction($action, $params);
});

/* ****************************** WEBSITE ROUTE ********************************** */
// Route::group(['middleware' => 'auth.jwt'], function () {
Route::match(['get', 'post'], '{controller}/{action?}/{params?}', function ($controller, $action = 'index', $params = '') {
    // echo $controller;exit;
    $params = explode('/', $params);
    $app = app();
    $controller = $app->make("\App\Http\Controllers\\" . ucwords($controller) . 'Controller',['action' => $action]);
    return $controller->callAction($action, $params);
});
// });
/* ****************************** AJAX Controller ********************************** */
Route::match(['get', 'post'], '/Ajax/{action}', function ($action) {
    $app = app();
    $controller = $app->make("\App\Http\Controllers\AjaxController");
    return $controller->callAction($action, []);
});

