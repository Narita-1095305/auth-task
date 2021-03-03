@extends('layout.layout')

@section('title', 'ログインフォーム')

@include('layout.header')
@section('content')
    <div class="w-75 mx-auto mt-3">
        <div class="w-75 mx-auto">
            @if($errors->any())
                <div class="alert alert-danger text-center">
                    @foreach($errors->all() as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
            <div class="form-background pt-2 pb-2">
                <form method="POST" action="{{ route('login')}}">
                    @csrf
                    <h1 class="text-center">ログイン</h1>
                    <div class="w-75 mx-auto">
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" value="submit">ログイン</button>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <a href="{{ route('password.request') }}">パスワードを忘れた場合</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layout.footer')