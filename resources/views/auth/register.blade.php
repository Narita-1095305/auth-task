@extends('layout.layout')

@section('title', '登録フォーム')

@include('layout.header')
@section('content')
    <div class="w-75 mx-auto mt-3">
        <div class="w-75 mx-auto">
            @if($errors->any())
                <div class="alert alert-danger text-center">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-background pt-2 pb-2">
                <form method="POST" action="{{ route('register')}}">
                    @csrf
                    <h1 class="text-center">会員登録</h1>
                    <div class="w-75 mx-auto">
                        <div class="form-group mx-auto">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group mx-auto">
                            <label for="name">ユーザー名</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mx-auto">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group mx-auto">
                            <label for="password">パスワード確認</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" value="submit">登録</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layout.footer')