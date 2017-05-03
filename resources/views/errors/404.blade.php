@extends('layouts.main')
@section('content')

<style type="text/css">
    
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }

</style>>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    ہم معذرت خواہ ہیں. ایک خامی پیش آگئی ہے، مطلوبہ صفحہ نہیں مل سکا
                </div>
                <div class="error-actions">
                    <a href="{{url('')}}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        پہلا صفحہ </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection