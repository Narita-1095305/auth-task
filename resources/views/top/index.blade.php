@extends('layout.layout')

@section('title', 'トップページ')

@include('layout.header')
@section('content')
    <div class="text-center">
        <h1>ログインされていません。</h1>
        
        <p>登録済みであればログインしてください。</p>
        <div class="m-3">
            <a href="{{ route('login')}}" class="btn btn-primary">
                ログイン
            </a>
        </div>

        <p>登録がまだであればこちらから</p>
        <div class="m-3">
            <a href="{{ route('register')}}" class="btn btn-success">
                登録
            </a>
        </div>
    </div>
@endsection

@include('layout.footer')