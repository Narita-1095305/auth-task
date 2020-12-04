@extends('layout.layout')

@section('title', 'タスク編集フォーム')

@include('layout.header')
@section('content')
    <div class="text-center w-75 mx-auto">
        @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                      <p>{{ $message->message }}</p>
                  @endforeach
              </div>
        @endif
        <form method="POST" action="{{ route('tasks.edit', ['task_id' => $task->id]) }}">
          @csrf
          <div class="form-group">
            <label for="task">課題</label>
            <input type="text" class="form-control" name="title"value={{ old('title') ?? $task->title }}>
          </div>
            <div class="form-group">
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
                <button class="btn btn-success" value="submit">送信</div>
            </div>
        </form>
    </div>
@endsection

@include('layout.footer')