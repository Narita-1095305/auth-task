@extends('layout.layout')

@section('title', 'タスク表示フォーム')

@include('layout.header')
@section('content')
    <div class="text-center w-75 mx-auto">
        @if(session('message'))
            <div class="alert alert-success m-1">
                <div>{{ session('message') }}</div>
            </div>
        @endif
        <h1 class="mt-1">課題一覧</h1>
        <div class="m-1">
            <a class="btn btn-primary" href="{{ route('tasks.add') }}">タスクを追加する</a>
        </div>

        <div class="m-1">
            <a class="btn btn-success" href="{{ route('tasks.all') }}">すべてのタスク</a>
            <a class="btn btn-secondary" href="{{ route('tasks.done') }}">完了したタスク</a>
            <a class="btn btn-info" href="{{ route('tasks.duedate') }}">締切順</a>
        </div>        
        <table class="table text-center">
            
            <tr>
                <th class="align-middle">Task</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Deadline</th>
                <th class="align-middle">Status Change</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td  class="align-middle">
                    <a href="{{ route('tasks.detail', ['task_id' => $task->id]) }}">
                        {{$task->title}}
                    </a>
                </td>
                <td class="align-middle {{$task->status_class}}">{{$task->status_label}}</td>
                <td  class="align-middle">残り{{$task->formatted_due_date}}日</td>
                <td>
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('tasks.edit', ['task_id' => $task->id]) }}">編集</a>
                        <a class="btn btn-danger" href="{{ route('tasks.delete', ['task_id' => $task->id]) }}">削除</a>
                    </div>
                </td>
            </tr>
            @endforeach
          </table>
    </div>
@endsection

@include('layout.footer')