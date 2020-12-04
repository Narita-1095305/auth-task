@extends('layout.layout')

@section('title', 'パスワードリセットフォーム')

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

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" />
        <h1>パスワード再発行フォーム</h1>
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="password">新しいパスワード</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="password">新しいパスワード確認</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
            <button class="btn btn-success" value="submit">送信</div>
        </div>
    </form>
</div>

@endsection

@include('layout.footer')