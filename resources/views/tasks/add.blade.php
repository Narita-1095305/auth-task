@extends('layout.layout')

@section('title', 'タスク追加フォーム')

@include('layout.header')
@section('content')
    <div class="w-75 mx-auto mt-3">
        <div class="w-75 mx-auto align-middle">
            @if($errors->any())
                <div class="alert alert-danger text-center">
                    @foreach($errors->all() as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
            <div class="form-background pt-2 pb-2">
                <!--コンポーネント化してもいいかもしれない-->
                <form method="POST" action="{{ route('tasks.add') }}">
                    @csrf
                    <!--入れ子構造にしてフォームの幅を狭める-->
                    <h1 class="text-center">課題追加フォーム</h1>
                    <div class="w-75 mx-auto">
                        <div class="form-group">
                            <label for="title">課題</label>
                            <input type="text" class="form-control" name="title" placeholder="○○のレポート" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group mx-auto">
                            <label for="status">着手状況</label>
                            <div>
                                <select name="status"　id="status">
                                    <option value="1" @if(old('status')=='1') selected @endif>未着手</option>
                                    <option value="2" @if(old('status')=='2') selected @endif>着手中</option>
                                    <option value="3" @if(old('status')=='3') selected @endif>完了</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mx-auto">
                            <label for="progress">進捗度:</label>
                            <input type="range" name="progress" class="form-control-range" value="{{ old('progress') ?? 0}}" required>
                            <aside>進捗度は着手中の場合のみ任意の値が保存されます。(未着手:0,完了:100)</aside>
                        </div>
                        <div class="form-group mx-auto">
                            <label for="due_date">締切日時</label>
                            <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') }}" required>
                        </div>
                        <div class="form-group mx-auto">
                            <label for="comment">コメント</label>
                            <textarea class="form-control" name="comment">{{ old('comment')}}</textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" value="submit">課題を新規作成</button>
                            <a class="btn btn-secondary" href="{{ route('tasks.index')}}">キャンセル</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layout.footer')