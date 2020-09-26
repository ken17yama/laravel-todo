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
          <form action="{{ route('todos.destroy',$todo->id) }}" method="POST">
            <a href="{{ route('todos.show',$todo->id) }}" title="show">
              <i class="fas fa-eye text-success  fa-lg"></i>
            </a>
            <a href="{{ route('todos.edit',$todo->id) }}" title="edit">
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