<?php

use Eeno\Support\Facade\Route;

Route::get( '/' , 'PagesController@index' )->name('home'); 
Route::get( '/about' , 'PagesController@about' )->name('about');