@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Room</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="/todos/create" title="Create a todo"> <i class="fas fa-plus-circle"></i>
          </a>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <table class="table table-bordered table-responsive-lg">
    <tr>
      <th>ルーム名</th>
      <th>ルーム詳細</th>
      <th>最終更新日</th>
    </tr>
    @foreach ($rooms as $room)
      <tr>
        <td><a href="/room/{{$room->id}}" title="show">{{$room->name}}</a></td>
        <td>{{$room->description}}</td>
        <td>{{$room->updated_at->format('Y/m/d')}}</td>
      </tr>
    @endforeach
  </table>

@endsection
