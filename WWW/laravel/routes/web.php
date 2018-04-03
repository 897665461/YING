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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/shiyan',"ShiyanController@getlist");
Route::any('/shiyanq',function ()
{
    return view('shiyanq');
});
Route::any('/zujian',function ()
{
    return view('zujian');
});
Route::any('/zujianq',function ()
{
    return view('zujianq');
});
Route::any('/session/{ere}/',function (\Illuminate\Http\Request $request)
{
    session(['qw'=>'wqqw']);

    $wewew = session('qw','11212');
    print_r($request->session()->all());
    print_r(session('q'));
    print_r($request->session()->get('qw'));
    echo $wewew;
    print_r($request->session()->has('qw'));
    echo(url('ewrewre/33232'));
    echo '</br>';
    echo url()->current();
    echo '</br>';
    echo url()->full();
    echo '</br>';
    echo url()->previous();
    echo '</br>';
    echo action('ShiyanController@getlist',['shi'=>12]);

});

