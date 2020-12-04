@extends('layout.layout')

@section('title', 'トップページ')

@include('layout.header')
@section('content')
    <div class="text-center">
        <h1>はじめてのタスク作成</h1>
        <p>タスクを作成しましょう</p>

        <a href="{{ route('tasks.add')}}">
            タスク作成をする
        </a>

    </div>
@endsection

@include('layout.footer')