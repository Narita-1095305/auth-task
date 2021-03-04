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
            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $task->title }}">
          </div>
          <div class="form-group mx-auto">
            <label for="status">着手状況</label>
            <div>
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
          </div>
          <div class="form-group mx-auto">
            <label for="progress">進捗度:</label>
            <input type="range" name="progress" class="form-control-range" value="{{ old('progress') ?? $task->progress}}" required>
            <aside>進捗度は着手中の場合のみ任意の値が保存されます。(未着手:0,完了:100)</aside>
          </div>
          <div class="form-group mx-auto">
            <label for="deadline">締切日時</label>
            <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') ?? $task->date_to_datetime_local }}">
          </div>
          <div class="form-group mx-auto">
            <label for="comment">コメント</label>
            <textarea class="form-control" name="comment">{{ old('comment') ?? $task->comment }}</textarea>
          </div>
          <div class="text-center">
            <button class="btn btn-success m-1" value="submit">編集を行う</button>
            <a class="btn btn-secondary m-1" href="{{ route('tasks.index')}}">キャンセル</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@include('layout.footer')