@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>  </h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
    </div>
  </div>
</div>

<table class="table table-bordered table-responsive-lg">
    <tr>
      <th>状態</th>
      <th>タスク</th>
      <th>詳細</th>
      <th>開始日</th>
      <th>期限日</th>
      <th>親タスク</th>
      <th>room_id</th>
      <th>作成日</th>
      <th>更新日</th>
      <th></th>
    </tr>
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
        <td>{{$todo->room_id}}</td>
        <td>{{$todo->created_at->format('Y/m/d')}}</td>
        <td>{{$todo->updated_at->format('Y/m/d')}}</td>
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
  </table>
@endsection
