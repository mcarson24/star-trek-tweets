<?php

use App\Models\Tweet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tweets', ['tweets' => Tweet::paginate(100)]);
});
