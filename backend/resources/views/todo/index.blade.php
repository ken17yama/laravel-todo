@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Todo</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('todo.create',$room_id) }}" title="Create a todo"> <i class="fas fa-plus-circle"></i>
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
      <th>状態</th>
      <th>タスク</th>
      <th>詳細</th>
      <th>開始日</th>
      <th>期限日</th>
      <th>親タスク</th>
      <th></th>
    </tr>
    @foreach ($todos as $todo)
      <tr>
        <td>
            @if ($todo->state)
                済
            @else
                未
            @endif
        </td>
        <td>{{$todo->title}}</td>
        <td>{{$todo->description}}</td>
        <td>
            @if ($todo->start_date)
                {{ $todo->start_date->format('Y/m/d') }}
            @endif
        </td>
        <td>
            @if ($todo->due_date)
                {{ $todo->due_date->format('Y/m/d') }}
            @endif
        </td>
        <td>{{$todo->parent_id}}</td>
        <td>
          <form action="{{ route('todo.destroy',[$room_id, $todo->id]) }}" method="POST">
            <a href="{{ route('todo.show',[$room_id, $todo->id]) }}" title="show">
              <i class="fas fa-eye text-success  fa-lg"></i>
            </a>
            <a href="{{ route('todo.edit',[$room_id, $todo->id]) }}" title="edit">
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

  <style>
    li{
        padding-left: 10px;
    }
  </style>

  <p>=================================</p>
  <div>
    @php
        function menu($data,$parent=-1) {
            $res='';
            foreach($data as $e) {
                if($e['parent_id']==$parent||($parent==-1&&$e['parent_id']==0)) {
                    $res.='<li>'.$e['title'];
                    $sub=menu($data,$e['id']);
                    if($sub) $res.='<ul>'.$sub.'</ul>';
                    $res.='</li>';
                }
            }
            return $res;
        }
        echo('<ul>');
        echo(menu($todos));
        echo('</ul>');
    @endphp
  </div>

@endsection
