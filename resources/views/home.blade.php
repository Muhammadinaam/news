@extends('layouts.main')
@section('content')

<div class="container">

	
	

	
	<div class="row">


		
		<div class="col-md-8">

		@foreach(App\Category::whereNotNull('published_by')->orderBy('order_on_homepage')->get() as $category)

			<?php
			$latest_news = $category
							->news()
							->whereNotNull('published_by')
							->latest('news_datetime')
							->limit($category->news_on_homepage)
							->get();
			?>
		
		

			<div class="panel panel-success">
				<div class="panel-heading">
					<a href="{{url('category/'.$category->id)}}">
						<h1 style="margin: 0; color:black;">{{$category->title}}</h1>
					</a>
				</div>
				<div class="panel-body">
					

					@foreach($latest_news as $news)
					<div class="col-md-4">

						<a href="{{url('news').'/'.$news->id}}">
							<img style="width: 100%;" src="{{asset($news->image)}}">
							<h3>{{$news->heading}}</h3>
						</a>

						<p>
							{{ str_limit( $news->detail, 150, '...') }}
							<a href="{{url('news').'/'.$news->id}}">بقیہ</a>
						</p>

						<small dir="ltr">{{ \Carbon\Carbon::parse($news->news_datetime)->format('d M Y h:i a') }}</small>

					</div>
					@endforeach

				</div>
			</div>
		

		@endforeach

		</div>

		<div class="col-md-4">

     		<div class="panel panel-info">
				<div class="panel-heading">
					<a href="{{url('articles')}}">
						<h1 style="margin: 0; color:black;">آرٹیکلز</h1>
					</a>
				</div>
				<div class="panel-body">
					
					@php

					$articles = DB::table('articles')
									->whereNotNull('published_by')
									->join('cms_users', 'cms_users.id', '=', 'articles.created_by')
									->select('cms_users.photo', 'articles.title', 'articles.detail', 'articles.article_datetime', 'cms_users.name', 'articles.id')
									->orderBy('article_datetime', 'desc')
									->limit(20)
									->get();

					@endphp

					@foreach($articles as $article)
					<div class="row">
						<div class="col-md-8">
							<h1>{{$article->title}}</h1>

							<p>
								{{ str_limit( $article->detail, 150, '...') }}
								<a href="{{url('articles').'/'.$article->id}}">بقیہ</a>
							</p>
							<br>
							<small>{{$article->name}}</small>
							<br>
							<small dir="ltr">{{ \Carbon\Carbon::parse($article->article_datetime)->format('d M Y') }}</small>
						</div>
						<div class="col-md-4">
							<img style="width: 100%;" src="{{asset($article->photo)}}">
						</div>
					</div>
					<hr>
					@endforeach

				</div>
			</div>

		

        </div>


	</div>
	



</div>

@endsection
