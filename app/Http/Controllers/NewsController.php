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
    	$news = News::where('id', $id)->whereNotNull('published_by')->first();

    	if($news == null)
    	{
    		abort(404, 'Page Not Found');
    	}
    	

    	return view('news', compact('news'));
    }
}
