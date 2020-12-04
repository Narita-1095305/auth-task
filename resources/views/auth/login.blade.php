@extends('layout.layout')

@section('title', 'ログインフォーム')

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
        <form method="POST" action="{{ route('login')}}">
            @csrf
            <h1>ログイン</h1>
            <div class="form-group">
              <label for="email">メールアドレス</label>
              <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button class="btn btn-success" value="submit">送信</div>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('password.request') }}">パスワードを忘れた場合</a>
        </div>
    </div>
@endsection

@include('layout.footer')