@extends('layout.layout')

@section('title', 'タスク詳細フォーム')

@include('layout.header')
@section('content')
    <div class="w-75 mx-auto mt-3">
        <div class="w-75 mx-auto align-middle">
            <div class="form-background pt-2 pb-2">
                <!--コンポーネント化してもいいかもしれない-->
                <!--入れ子構造にしてフォームの幅を狭める-->
                <h1 class="text-center">課題詳細フォーム</h1>
                <div class="w-75 mx-auto">
                    <div class="form-group">
                        <label for="title">課題名</label>
                        <p>{{$task->title}}</p>
                    </div>
                    <div class="form-group mx-auto">
                        <label for="status">着手状況</label>
                        <p>{{$task->status}}</p>
                    </div>
                    <div class="form-group mx-auto">
                        <label for="due_date">締切日時</label>
                        <p>{{$task->date_to_datetime }}</p>
                    </div>
                    <div class="form-group mx-auto">
                        <label for="comment">コメント</label>
                        <p>{{$task->comment }}</p>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success" href="{{ route('tasks.edit', ['task_id' => $task->id]) }}">編集</a>
                        <a class="btn btn-danger" href="{{ route('tasks.delete', ['task_id' => $task->id]) }}">削除</a>
                        <a class="btn btn-secondary" href="{{ route('tasks.index')}}">キャンセル</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layout.footer')