@extends('layout.layout')

@section('title', 'メール入力フォーム')

@include('layout.header')
@section('content')

<div class="text-center w-75 mx-auto">
    @if(session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>パスワード再発行フォーム</h1>
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <button class="btn btn-success" value="submit">送信</div>
        </div>
    </form>
</div>

@endsection

@include('layout.footer')