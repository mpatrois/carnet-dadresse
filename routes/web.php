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

Route::get('/api/xsrf-cookie-token', function () {
    return 'Request only for the xsrf-token cookie';
});

Route::prefix('api')->group(function () {
    Route::resource('contacts', 'ContactController');
    Route::get('/sources', function () {
        return \App\Source::all();
    });
});

Route::get('{any}', function () {
    $pathIndexFile = public_path() . '/static/app.html';
    if (file_exists($pathIndexFile)) {
        return File::get($pathIndexFile);
    }
    return "Lancez un build :<br> 
        cd vue-src <br>
        npm run build <br>";
})->where('any', '^((?!api).)*');


