@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Add New todo</h2>
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
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('todos.store') }}" method="POST" >
    @csrf

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>title:</strong>
          <input type="text" name="title" class="form-control" placeholder="title">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Description:</strong>
          <textarea class="form-control" style="height:50px" name="description"
            placeholder="description"></textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>State:</strong>
          <input type="checkbox" name="state" value="1" class="form-control" placeholder="state">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Start date:</strong>
          <input type="datetime-local" name="start_date" class="form-control">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Due date:</strong>
          <input type="datetime-local" name="due_date" class="form-control">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Parent:</strong>
          <input type="text" name="parent_id" class="form-control" placeholder="parent_id">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
@endsection
