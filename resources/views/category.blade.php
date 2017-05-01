@extends('layouts.main')
@section('content')

    <div class="container">



	    	
    	<div class="row">

    		<h1>{{$category->title}}</h1>


    		@foreach($news_paginated as $news)
    		<div class="col-md-3">

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

    	{{ $news_paginated->links() }}
	    	

    </div>

@endsection
