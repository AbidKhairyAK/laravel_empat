<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class Article extends Controller
{
    public function index()
    {
    	$article = Article::orderBy('created_at','desc')->get();
    	return view('santri.index', compact('article'));
    }
}
