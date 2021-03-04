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
                    <div>
                        <div><strong>課題名</strong></div>
                        <div>{{$task->title}}</div>
                    </div>
                    <div>
                        <div><strong>着手状況</strong></div>
                        <div class="{{$task->status_class}}">{{$task->status_label}}</div>
                    </div>
                    <div>
                        <div><strong>進捗</strong></div>
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
                    </div>
                    <div>
                        <div><strong>締切日時</strong></div>
                        <div>{{$task->date_to_datetime }}</div>
                    </div>
                    <div>
                        <div><strong>コメント</strong></div>
                        <div>{{$task->comment }}</div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success m-1" href="{{ route('tasks.edit', ['task_id' => $task->id]) }}">編集</a>
                        <a class="btn btn-danger m-1" href="{{ route('tasks.delete', ['task_id' => $task->id]) }}">削除</a>
                        <a class="btn btn-secondary m-1" href="{{ route('tasks.index')}}">キャンセル</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layout.footer')