@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Room</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="/room/create" title="Create a todo"> <i class="fas fa-plus-circle"></i>
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
      <th></th>
    </tr>
    @foreach ($rooms as $room)
      <tr>
        <td><a href="{{ route('room.show',$room->id) }}" title="show">{{$room->name}}</a></td>
        <td>{{$room->description}}</td>
        <td>{{$room->updated_at->format('Y/m/d')}}</td>
        <td>
          <form action="{{ route('room.destroy',$room->id) }}" method="POST">
            <a href="{{ route('room.show',$room->id) }}" title="show">
              <i class="fas fa-eye text-success  fa-lg"></i>
            </a>
            <a href="{{ route('room.edit',$room->id) }}" title="edit">
              <i class="fas fa-edit  fa-lg"></i>
            </a>
            @csrf
            @method('DELETE')
            <button type="submit" title="delete" style="border: none; background-color:transparent;">
              <i class="fas fa-trash fa-lg text-danger"></i>
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>

@endsection
