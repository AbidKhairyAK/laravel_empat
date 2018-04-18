<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
    	$article = Article::orderBy('created_at','desc')->get();
    	return view('article.index', compact('article'));
    }

    public function create()
    {
    	return view('article.create');
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'title' => 'required|min:10',
    		'content' => 'required'
    	]);

    	$request->merge([
    		'title' => title_case($request->title)
    	]);

    	Article::create($request->all());

    	return redirect('article')->with('article','Data article berhasil ditambahkan');
    }

    public function edit($id)
    {
    	$article = Article::find($id);
    	return view('article.edit',compact('article'));
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'title' => 'required|min:10',
    		'content' => 'required'
    	]);

    	$request->merge([
    		'title' => title_case($request->title)
    	]);

    	Article::find($request->id)->update($request->all());

    	return redirect('article')->with('article','Data article berhasil diupdate');
    }

    public function show($id)
    {
    	$article = Article::find($id);
    	return view('article.show',compact('article'));
    }

    public function delete($id)
    {
    	Article::findOrFail($id)->delete();
    	return redirect('article')->with('article','Data article berhasil dihapus');
    }
}
