@extends('business_casual')
@section('content')
<div class="row">
  <div class="box">
    <div>
      <h3>New Blog</h3>
      {!! Form::open(['url' => 'admin/store', 'method' => 'post']) !!}

      <div class="form-group">
        {{ Form::label('title', 'Titulo') }}
        {{ Form::text('title', null, ['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Content') }}
        {{ Form::textarea('content', null, ['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', null, ['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('image', 'Image') }}
        {{ Form::select('image', ['slide-1.jpg' => 'slide-1', 'slide-2.jpg' => 'slide-2']), null, ['class'=>'form-control'] }}
      </div>

      <a href="{{ route('admin.blog') }}" class="btn btn-default"><i class="fas fa-arrow-circle-left"></i> Return</a>
      <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection