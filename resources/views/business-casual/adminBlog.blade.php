@extends('business_casual')
@section('content')
<div>
  @if(session()->get('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div>
  @endif
  <a href="{{ route('admin.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
  <br><br>
</div>
<table class="table table-bordered bg-success">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">date</th>
        <th scope="col">author</th>
        <th scope="col">view</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($posts as $index => $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->image}}</td>
            <td>{{$post->created_date}}</td>
            <td>{{$post->author}}</td>
            <td><a href="#myModal{{$index}}" data-toggle="modal" data-target="#myModal{{$index}}"><i class='fas fa-eye'></i></a></td>
            <td><a href="{{ route('admin.edit', $post->id) }}"><i class='far fa-edit'></i></a></td>
            <td><a href="{{ route('admin.destroy', $post->id) }}"><i class="fas fa-trash"></i></a></td>
        </tr>    
    @endforeach
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Open Modal</button>

@foreach ($posts as $index => $post)
<!-- Modal -->
<div id="myModal{{$index}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$post->title}}</h4>
      </div>
      <div class="modal-body">
        <img src="{{asset('img/'.$post->image)}}" width="50%" height="50%" />
        <p>{{$post->description}}.</p>
        <p>{{$post->author}}.</p>
        <p>{{$post->created_date}}.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach

@endsection