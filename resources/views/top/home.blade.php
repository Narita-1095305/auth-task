@extends('layout.layout')

@section('title', 'トップページ')

@include('layout.header')
@section('content')
<div class="w-75 mx-auto mt-3">
    <div class="w-75 mx-auto align-middle">
        <div class="form-background pt-2 pb-2">
            <div class="text-center">
                <h1>初めてのタスク作成</h1>
                <div>
                    <a href="{{ route('tasks.add')}}">
                        タスク作成をする
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('layout.footer')