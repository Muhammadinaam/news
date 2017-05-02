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
    	$category = Category::where('id', $id)->whereNotNull('published_by')->first();

        if($category == null)
        {
            abort(404, 'Page Not Found');
        }
    	
    	$news_paginated = $category
						->news()
                        ->whereNotNull('published_by')
						->orderBy('news_datetime', 'desc')
						->paginate(12);

    	return view('category', compact('category','news_paginated'));
    }
}
