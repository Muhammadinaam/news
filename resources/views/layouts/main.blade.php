<!DOCTYPE html>
<html>

<head>
	<title>News</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="{{asset('js/crawler.js')}}">

    /* Text and/or Image Crawler Script v1.53 (c)2009-2011 John Davenport Scheuer
       as first seen in http://www.dynamicdrive.com/forums/
       username: jscheuer1 - This Notice Must Remain for Legal Use
    */

  </script>

</head>


<style type="text/css">

.panel {
  -webkit-box-shadow: 0px 0px 65px -16px rgba(0,0,0,0.75);
  -moz-box-shadow: 0px 0px 65px -16px rgba(0,0,0,0.75);
  box-shadow: 0px 0px 65px -16px rgba(0,0,0,0.75);
}

.navbar {
  border-radius: 0px;
  margin-bottom: 0px;
}

.navbar-default {
  background-color: #6171e8;
  border-color: #4c58b6;
}
.navbar-default .navbar-brand {
  color: #ecf0f1;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #ecdbff;
}
.navbar-default .navbar-text {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a {
  color: white;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #ecdbff;
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #6171e8;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #ecdbff;
  background-color: #4c58b6;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
  background-color: #4c58b6;
}
.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
  color: #ecdbff;
  background-color: #4c58b6;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #ecdbff;
  background-color: #4c58b6;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #ecdbff;
  background-color: #4c58b6;
}
.navbar-default .navbar-toggle {
  border-color: #4c58b6;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #4c58b6;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #ecf0f1;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #ecf0f1;
}
.navbar-default .navbar-link {
  color: #ecf0f1;
}
.navbar-default .navbar-link:hover {
  color: #ecdbff;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #ecf0f1;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ecdbff;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ecdbff;
    background-color: #4c58b6;
  }
}

</style>


<body>

  

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
      </div>
      <ul class="nav navbar-nav">
        <li style="font-size: 20px; font-weight: bold;" class="{{Request::url() == url('') ? 'active' : ''}}"><a href="{{url('')}}">پہلا صفحہ</a></li>

        <li style="font-size: 20px; font-weight: bold;" class="{{Request::segment(1) == 'articles'? 'active' : ''}}" ><a href="{{url('articles')}}">آرٹیکلز</a></li>

        @foreach( \App\Category::whereNotNull('published_by')->orderBy('order_on_homepage')->get() as $category )
        <li style="font-size: 20px; font-weight: bold;" class="{{Request::segment(1) == 'category' && Request::segment(2) == $category->id ? 'active' : ''}}" ><a href="{{url('category/'.$category->id)}}">{{$category->title}}</a></li>
        @endforeach

      </ul>
    </div>
  </nav>


    @php
    $tickers = DB::table('tickers')
                  ->select('tickers.ticker_text', 'categories.title')
                  ->join('categories', 'categories.id', '=', 'tickers.category_id')
                  ->whereNotNull('tickers.published_by')
                  ->orderBy('ticker_datetime', 'desc')
                  ->limit(10)
                  ->get();

    $tickers_html = array();

    

    @endphp
  
    <table style="width: 100%;background-color: #6171e8;">
      <tr>
        <td style="width: 10%;"><img style="width: 100%; min-width: 100px; padding: 5px;" src="{{asset('images/logo.jpg')}}"></td>
        <td style="width: 90%; color: white; padding: 10px;">

          <h3>
            <div class="marquee" id="mycrawler">

              @foreach($tickers as $ticker)
              <small><span>----------------</span></small>
              <span class="label label-success">{{$ticker->title}}</span>
                {{$ticker->ticker_text}}
              <span class="label label-success">{{$ticker->title}}</span>
              @endforeach
            </div>
          </h3>

          

        </td>
      </tr>
    </table>

  <br>
  

	@yield('content')


<script type="text/javascript">
  
  $(document).ready(function(){
    marqueeInit({
      uniqueid: 'mycrawler',
      
      inc: 5, //speed - pixel increment for each iteration of this marquee's movement
      mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
      moveatleast: 2,
      neutral: 150,
      direction: 'right',

    });

  });

</script>  

</body>

</html>
