@extends('layout.layout')

@section('title', '404')

@include('layout.header')
@section('content')
    <div class="text-center">
        <h1>お探しのページは見つかりませんでした。</h1>
        <a href="{{ route('home') }}" class="btn btn-primary">
            ホームへ戻る
        </a>
    </div>
@endsection

@include('layout.footer')