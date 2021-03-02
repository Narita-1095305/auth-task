@extends('layout.layout')

@section('title', 'タスク編集フォーム')

@include('layout.header')
@section('content')
<div class="w-75 mx-auto mt-3">
  <div class="w-75 mx-auto">
    @if($errors->any())
      <div class="alert alert-danger">
      @foreach($errors->all() as $message)
        <div>{{ $message->message }}</div>
      @endforeach
      </div>
    @endif
    <div class="form-background pt-2 pb-2">
      <form method="POST" action="{{ route('tasks.edit', ['task_id' => $task->id]) }}">
        @csrf
        <h1 class="text-center">課題編集フォーム</h1>
        <div class="w-75 mx-auto">
          <div class="form-group" style="none;">
            <label for="task">課題</label>
            <input type="text" class="form-control" name="title"value={{ old('title') ?? $task->title }}>
          </div>
          <div class="form-group text-center mx-auto">
            <label for="status">着手状況</label>
            <select name="status"　id="status">
            @foreach(\App\Task::STATUS as $key => $val)
              <option
              value="{{ $key }}"
              {{ $key == old('status', $task->status) ? 'selected' : '' }}
              >
              {{ $val['label'] }}
              </option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="deadline">締切日時</label>
            <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') ?? $task->date_to_datetime_local }}">
          </div>
          <div class="form-group">
            <label for="comment">コメント</label>
            <input type="text" class="form-control" name="comment" placeholder="現在○○まで終了" value={{ old('comment') ?? $task->comment }}>
          </div>
          <div class="form-group">
            <button class="btn btn-success" value="submit">送信</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@include('layout.footer')