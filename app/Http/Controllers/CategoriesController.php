<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    //
    
    public function show($id)
    {
    	$category = Category::find($id);
    	
    	$news_paginated = $category
						->news()
                        ->whereNotNull('published_by')
						->orderBy('news_datetime', 'desc')
						->paginate(12);

    	return view('category', compact('category','news_paginated'));
    }
}
