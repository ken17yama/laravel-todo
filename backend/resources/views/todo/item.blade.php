
@if ($e['state'])
    <input type="checkbox" name="todo-{{ $e['id'] }}" class="todo-check" checked>
@else
    <input type="checkbox" name="todo-{{ $e['id'] }}" class="todo-check">
@endif
<label for="title-{{ $e['id'] }}" class="todo-title">{{ $e['title'] }}</label>
<input type="checkbox" id="title-{{ $e['id'] }}" class="todo-display-check">
<div class="todo-detail">
    <ul class="">
        @if($e['description'])
            <li><p>{{ $e['description'] }}</p></li>
        @endif
        <li>
            <span>開始：</span>
            @if ($e['start_date'])
                {{ $e['due_date']->format('Y/m/d') }}
            @else
                未設定
            @endif
        </li>
        <li>
            <span>期限：</span>
            @if ($e['due_date'])
                {{ $e['due_date']->format('Y/m/d') }}
            @else
                未設定
            @endif
        </li>
        <li>
        <form action="{{ route('todo.destroy',[$room_id, $e['id']]) }}" method="POST">
            <a href="{{ route('todo.show',[$room_id, $e['id']]) }}" title="show">
              <i class="fas fa-eye text-success  fa-lg"></i>
            </a>
            <a href="{{ route('todo.edit',[$room_id, $e['id']]) }}" title="edit">
              <i class="fas fa-edit  fa-lg"></i>
            </a>
            @csrf
            @method('DELETE')
            <button type="submit" title="delete" style="border: none; background-color:transparent;">
              <i class="fas fa-trash fa-lg text-danger"></i>
            </button>
        </form>
        </li>
    </ul>
</div>
