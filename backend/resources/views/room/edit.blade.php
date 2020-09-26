@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Edit Room</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Error!</strong>
      <ul>
        @foreach ($errors->all() as $error)
          <li></li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('room.update',$room->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" class="form-control" placeholder="name" value="{{ $room->name }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Description:</strong>
          <textarea class="form-control" style="height:50px" name="description"
            placeholder="description">{{ $room->description }}</textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
@endsection
