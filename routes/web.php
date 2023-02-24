<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RequestContactController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkController;

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

Route::get('/', [MainController::class, 'page'])
    ->name('index');

Route::name('requests.')->group(function(){
    Route::post('/reqcont', [RequestController::class, 'contactNew'])
        ->name('contact');

    Route::post('/reqcontserv', [RequestController::class, 'contactServiceRequestNew'])
        ->name('contactService');

    Route::post('/service/{id}', [RequestController::class, 'serviceNew'])
        ->name('service');

    Route::post('/work/{id}', [RequestController::class, 'workNew'])
        ->name('work');

    Route::post('/news/{id}/comment', [RequestController::class, 'commentNew'])
        ->name('comment');

    Route::post('/newfilter', [RequestController::class, 'filterNews'])
        ->name('newFilter');

    Route::post('/workfilter', [RequestController::class, 'filterWork'])
        ->name('workFilter');

    Route::post('/subscribe', [RequestController::class, 'subscribe'])
        ->name('subscribe');
});

Route::name('contacts.')->group(function(){
    Route::get('/contacts', [ContactsController::class, 'page'])
        ->name('page');
});

Route::name('about.')->group(function(){
    Route::get('/about', [AboutController::class, 'page'])
        ->name('page');
});

Route::name('new.')->group(function(){
    Route::get('/news', [NewController::class, 'all'])
        ->name('all');

    Route::get('/news/{id}', [NewController::class, 'page'])
        ->whereNumber('id')
        ->name('page');
});

Route::name('service.')->group(function(){
    Route::get('/services', [ServiceController::class, 'all'])
        ->name('all');

    Route::get('/services/{id}', [ServiceController::class, 'page'])
        ->whereNumber('id')
        ->name('page');
});

Route::name('work.')->group(function(){
    Route::get('/works', [WorkController::class, 'all'])
        ->name('all');

    Route::get('/works/{id}', [WorkController::class, 'page'])
        ->whereNumber('id')
        ->name('page');
});

Route::match(["POST", "GET"], '/payments/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');
Route::post('/payments/create/{id}', [PaymentController::class, 'create'])
    ->name('payment.create');
Route::get('/payments', [PaymentController::class, 'index'])
    ->name('payment.index');
