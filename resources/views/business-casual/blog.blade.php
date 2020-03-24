@extends('business_casual')
@section('content')
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Company <strong>blog</strong>
            </h2>
            <hr>
        </div>
        @foreach ($posts as $post)
        <div class="col-lg-12 text-center">
            <img class="img-responsive img-border img-full" src="img/{{$post->image}}" alt="">
            <h2>{{$post->title}}
                <br>
                <small>{{$post->created_date}}</small>
            </h2>
        <p>{{$post->description}}</p>
            <a href="#" class="btn btn-default btn-lg">Read More</a>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@endsection