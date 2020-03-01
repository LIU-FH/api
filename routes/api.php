<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::middleware('throttle:' . config('api.rate_limits.sign'))->group(function () {
        require base_path('routes/api/auth.php');
    });
    Route::middleware('throttle:' . config('api.rate_limits.access'))->group(function () {
        foreach (File::allFiles(base_path('routes/api')) as $file) {
            require $file->getPathname();
        }

    });
});
