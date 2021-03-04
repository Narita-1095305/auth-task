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

        <div class="form-inline text-center justify-content-center">
            <label for="task">フィルター：</label>
            <form class="form-inline" action="{{route ('tasks.search')}}">
                <input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}">
                <div class="m-1">
                <button class="btn btn-dark">検索</button>
                </div>
            </form>
        </div>
        <div class="m-1">
            <a class="btn btn-primary" href="{{ route('tasks.add') }}">タスクを追加する</a>
        </div>

        <div class="m-1">
            <a class="btn btn-success m-1" href="{{ route('tasks.all') }}">すべてのタスク</a>
            <a class="btn btn-secondary m-1" href="{{ route('tasks.done') }}">完了したタスク</a>
            <a class="btn btn-info m-1" href="{{ route('tasks.duedate') }}">締切順</a>
            <a class="btn btn-warning m-1" href="{{ route('tasks.progress') }}">進捗順</a>
        </div>        
        <table class="table text-center table-responsive-sm">
            
            <tr>
                <th class="align-middle">Task</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Deadline</th>
                <th class="align-middle">Progress</th>
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
                <td class="align-middle">残り{{$task->formatted_due_date}}日</td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="progress-bar"
                            style="width:{{$task->progress}}%"
                            role="progressbar"
                            aria-valuenow="{{$task->progress}}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{$task->progress}}%
                        </div>
                        <div class="progress-bar bg-danger"
                            style="width:{{100 - $task->progress}}%"
                            role="progressbar"
                            aria-valuenow="{{100 - $task->progress}}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{100 - $task->progress}}%
                        </div>
                    </div>
                    <small>青:完了 赤:未</small>
                </td>
                <td class="align-middle">
                    <div>
                        <a class="btn btn-success" href="{{ route('tasks.complete', ['task_id' => $task->id]) }}">完了</a>
                    </div>
                </td>
            </tr>
            @endforeach
          </table>
          <div class="pagination justify-content-center"> 
            @if(\route::is('tasks.search'))
              {{ $tasks->appends(request()->input())->links() }}
            @else
              {{$tasks->links()}}
            @endif 
          </div>
    </div>
@endsection

@include('layout.footer')