@extends('layout.layout')

@section('title', '登録フォーム')

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
        <form method="POST" action="{{ route('register')}}">
            @csrf
            <h1>会員登録</h1>
            <div class="form-group">
              <label for="email">メールアドレス</label>
              <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="password">パスワード確認</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <button class="btn btn-success" value="submit">送信</div>
            </div>
        </form>
    </div>
@endsection

@include('layout.footer')