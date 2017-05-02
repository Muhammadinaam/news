<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    
    public function index()
    {
    	$paginated_articles = Article::whereNotNull('published_by')
    					->join('cms_users', 'cms_users.id', '=', 'articles.created_by')
    					->select('cms_users.photo as author_photo', 'articles.id', 'articles.title', 'articles.detail', 'articles.article_datetime')
						->orderBy('article_datetime', 'desc')
						->paginate(12);

		return view('articles.index', compact('paginated_articles'));
    }

    public function show($id)
    {
    	$article = Article::where('articles.id', $id)
    				->whereNotNull('published_by')
    				->join('cms_users', 'cms_users.id', '=', 'articles.created_by')
    				->select('cms_users.photo as author_photo', 'articles.id', 'articles.title', 'articles.detail', 'articles.article_datetime')
    				->first();

    	if($article == null)
    		abort(404);

    	return view('articles.article', compact('article'));
    }

}
