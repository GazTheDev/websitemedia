<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Posts extends Controller
{
    //
}
$posts = \App\ModelName::latest()->take(5)->get();
