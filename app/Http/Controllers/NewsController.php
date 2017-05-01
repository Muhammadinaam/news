<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    //
    

    public function show($id)
    {
    	$news = News::find($id)->whereNotNull('published_by')->first();

    	

    	return view('news', compact('news'));
    }
}
