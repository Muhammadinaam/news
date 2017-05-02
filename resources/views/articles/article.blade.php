@extends('layouts.main')
@section('content')

    <div class="container">



	    	
    	<div class="row">



    		<div class="col-md-12">

    			<div class="row">

                    <div class="col-md-2">
    				    <img style="width: 100%;" src="{{asset($article->author_photo)}}">
                    </div>

                    <div class="col-md-10">
        				<h3>{{$article->title}}</h3>
                        <small dir="ltr">{{ \Carbon\Carbon::parse($article->article_datetime)->format('d M Y') }}</small>
                    </div>
    			</div>
    			
    			<p>
    				{{ $article->detail }}
    			</p>
    			
    			

    		</div>

           
    		

    	</div>

	    	

    </div>

@endsection
