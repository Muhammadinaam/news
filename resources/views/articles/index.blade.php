@extends('layouts.main')
@section('content')

    <div class="container">



	    	
    	<div class="row">

    		<h1>آرٹیکلز</h1>


    		@foreach($paginated_articles as $article)
    		<div class="col-md-3">

    			<a href="{{url('articles').'/'.$article->id}}">
    				<img style="width: 100%;" src="{{asset($article->author_photo)}}">
    				<h3>{{$article->title}}</h3>
    			</a>
    			
    			<p>
    				{{ str_limit( $article->detail, 150, '...') }}
    				<a href="{{url('articles').'/'.$article->id}}">بقیہ</a>
    			</p>
    			
    			<small dir="ltr">{{ \Carbon\Carbon::parse($articles->article_datetime)->format('d M Y h:i a') }}</small>

    		</div>
    		@endforeach

    	</div>

    	{{ $paginated_articles->links() }}
	    	

    </div>

@endsection
