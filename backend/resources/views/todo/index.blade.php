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
  <div>
    @php
        echo('<ul>');
        build_todo($todos, 0, 0);
        echo('</ul>');

        function build_todo($todos, $parent_id) {
            // parent_idが残っているか判定
            echo('<ul>');
            foreach($todos as $todo) {
                if ($todo->parent_id == $parent_id) {
                    echo('<li>');
                    echo($todo->title);
                    build_todo($todos, $todo['id']);
                    echo('</li>');
                }
            }
            echo('</ul>');
        }
    @endphp
    <p>=================================</p>
    <p>{{ $todos }}</p>
  </div>
  <div>
        <ul>
            <li>
            犬を飼う
                <ul>
                    <li>ケージを買う</li>
                    <li>引っ越し先に申し込む
                        <ul>
                            <li>
                                敷金を払う
                            </li>
                        </ul>
                    </li>
                    <li>
                        お気に入りのコーギーを探す
                        <ul>
                            <li>
                                ブリーダーに連絡する
                                <ul>
                                    <li>受け取りの方法を連絡する</li>
                                    <li>
                                        ブリーダーに生まれたら連絡してもらう
                                        <ul>
                                            <li>尻尾を切るかどうか連絡する</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
  </div>

@endsection
