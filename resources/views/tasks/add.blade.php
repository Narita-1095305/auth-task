@extends('layout.layout')

@section('title', 'タスク追加フォーム')

@include('layout.header')
@section('content')
    <div class="text-center w-75 mx-auto">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('tasks.add') }}">
            @csrf
            <h1>課題追加フォーム</h1>
            <div class="form-group">
              <label for="title">課題</label>
              <input type="text" class="form-control" name="title" placeholder="○○のレポート" value={{ old('title') }}>
            </div>
            <div class="form-group">
                <label for="status">着手状況</label>
                <select name="status"　id="status">
                    <option value="1" @if(old('status')=='1') selected @endif>未着手</option>
                    <option value="2" @if(old('status')=='2') selected @endif>着手中</option>
                    <option value="3" @if(old('status')=='3') selected @endif>完了</option>
                </select>
            </div>
            <div class="form-group">
                <label for="due_date">締切日時</label>
                <input type="datetime-local" class="form-control" name="due_date" value={{ old('due_date') }}>
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <input type="text" class="form-control" name="comment" placeholder="現在○○まで終了" value={{ old('comment') }}>
              </div>
            <div class="form-group">
                <button class="btn btn-success" value="submit">送信</div>
            </div>
        </form>
    </div>
@endsection

@include('layout.footer')