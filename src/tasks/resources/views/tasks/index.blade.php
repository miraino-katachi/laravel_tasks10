@extends('layouts.app')

@section('content')

<h1>タスク一覧</h1>
<table class="table">
    <tr>
        <th>登録日</th>
        <th>タイトル</th>
        <th>期限日</th>
        <th>完了日</th>
        <th></th>
    </tr>
    @foreach ($tasks as $task)
    <tr class="
        @if (!is_null($task->completion_date))
            text-decoration-line-through
        @elseif ($task->expiration_date < date('Y-m-d'))
            table-danger
        @endif
    ">
        <td>{{ $task->registration_date->format('Y年m月d日') }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->expiration_date->format('Y年m月d日') }}</td>
        <td>{{ !is_null($task->completion_date) ? $task->completion_date->format('Y年m月d日') : ''}}</td>
        <td>
            <form action="{{ route('tasks.destroy', $task) }}" method="post" class="form-inline">
                @method('DELETE')
                @csrf
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-primary">詳細</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">修正</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $tasks->links() }}

@endsection