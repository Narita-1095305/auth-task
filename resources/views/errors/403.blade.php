@extends('layout.layout')

@section('title', '403')

@include('layout.header')
@section('content')
    <div class="text-center">
        <h1>ページにアクセスする権限がありません。</h1>
        <a href="{{ route('home') }}" class="btn btn-primary">
            ホームへ戻る
        </a>
    </div>
@endsection

@include('layout.footer')