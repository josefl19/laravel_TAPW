@extends('business_casual')
@section('content')
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">About <strong>business casual</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-6">
            <img class="img-responsive img-border-left" src="img/slide-2.jpg" alt="">
        </div>
        <div class="col-md-6">
            <p>This is a great place to introduce your company or project and describe what you do.</p>
            <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Our <strong>Team</strong>
            </h2>
            <hr>
        </div>
            @foreach($team as $t)
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/{{$t->image}}" alt="">
                    <h3>{{$t->name}}
                        <small>{{$t->puesto}}</small>
                    </h3>
                </div>
            @endforeach
        <div class="clearfix"></div>
    </div>
</div>

@endsection