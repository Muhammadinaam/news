@extends('layouts.main')
@section('content')

    <div class="container">


    	@foreach(App\Category::orderBy('order_on_homepage')->get() as $category)

    	<?php
    		$latest_news = $category->news()->latest('news_datetime')->limit($category->news_on_homepage)->get();
    	?>

	    	@if( count($latest_news) > 0 )
	    	<div class="row">

	    		<a href="{{url('category/'.$category->id)}}"><h1>{{$category->title}}</h1></a>


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
	    	<hr>
	    	@endif
    	@endforeach

    </div>

@endsection
