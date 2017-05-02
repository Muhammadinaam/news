@extends('layouts.main')
@section('content')

    <div class="container">



	    	
    	<div class="row">


    		<h1>{{$news->category->title}}</h1>


    		<div class="col-md-8">

    			
				<img style="width: 100%;" src="{{asset($news->image)}}">
				<h3>{{$news->heading}}</h3>
                <small dir="ltr">{{ \Carbon\Carbon::parse($news->news_datetime)->format('d M Y h:i a') }}</small>
    			
    			
    			<p>
    				{{ $news->detail }}
    			</p>
    			
    			

    		</div>

            <div style="background-color: lightgray" class="col-md-4">

                

                <h2>{{$news->category->title}} میں مزید </h2>
                <hr>

                <?php
                    $latest_news = $news->category->news()->whereNotNull('published_by')->latest('news_datetime')->limit(5)->get();
                ?>

                    @if( count($latest_news) > 0 )
                    <div class="row">

                        <a href="{{url('category/'.$category->id)}}"><h1>{{$category->title}}</h1></a>


                        @foreach($latest_news as $news)
                        <div class="col-md-12">

                            <a href="{{url('news').'/'.$news->id}}">
                                <img style="width: 100%;" src="{{asset($news->image)}}">
                                <h3>{{$news->heading}}</h3>
                            </a>
                            
                            <p>
                                {{ str_limit( $news->detail, 150, '...') }}
                                <a href="{{url('news').'/'.$news->id}}">بقیہ</a>
                            </p>
                            
                            <small dir="ltr">{{ \Carbon\Carbon::parse($news->news_datetime)->format('d M Y h:i a') }}</small>

                            <hr>
                        </div>
                        
                        @endforeach

                    </div>
                    
                    @endif

            </div>
    		

    	</div>

	    	

    </div>

@endsection
