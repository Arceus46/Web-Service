<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BookService;
 
Route::get('/buku',        [BookService::class, 'index']);
Route::get('/buku/{id}',   [BookService::class, 'show']);
Route::post('/buku',       [BookService::class, 'store']);
Route::put('/buku/{id}',   [BookService::class, 'update']);
Route::delete('/buku/{id}',[BookService::class, 'destroy']);
