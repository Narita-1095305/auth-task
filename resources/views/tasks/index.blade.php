@extends('layout.layout')

@section('title', 'タスク表示フォーム')

@include('layout.header')
@section('content')
    <div class="text-center w-75 mx-auto">
        <table class="table table-borderless text-center">
            @if(session('message'))
                <div class="alert alert-success m-1">
                    <div>{{ session('message') }}</div>
                </div>
            @endif
            <tr>
                <th class="align-middle">Task</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Deadline</th>
                <th class="align-middle">Comment</th>
                <th class="align-middle">Status Change</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td  class="align-middle">{{$task->title}}</td>
                <td class="align-middle {{$task->status_class}}">{{$task->status_label}}</td>
                <td  class="align-middle">{{$task->formatted_due_date}}</td>
                <td  class="align-middle">{{$task->comment}}</td>
                <td>
                <div class="form-group">
                    <a class="btn btn-success" href="{{ route('tasks.edit', ['task_id' => $task->id]) }}">編集</a>
                    <a class="btn btn-danger" href="#" onclick="ans = confirm('削除しますか?'); if(ans) document.getElementById('delete').submit();">削除</a>
                    <form method="POST" id="delete" action="{{ route('tasks.delete', ['task_id' => $task->id]) }}">
                        @csrf
                    </form>
                </div>
            </td>
            </tr>
            @endforeach
          </table>
          <a class="btn btn-primary" href="{{ route('tasks.add') }}">タスクを追加する</a>
    </div>
@endsection

@include('layout.footer')