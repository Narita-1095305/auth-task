@extends('layout.layout')

@section('title', 'トップページ')

@include('layout.header')
@section('content')
<div class="w-75 mx-auto mt-3">
    <div class="w-75 mx-auto align-middle">
        <div class="form-background pt-2 pb-2">
            <div class="text-center">
                <h1>ログインされていません。</h1>
                <div>
                    <div>登録済みであればログインしてください。</div>
                    <div class="m-1">
                        <a href="{{ route('login')}}" class="btn btn-primary">
                            ログイン
                        </a>
                    </div>
                </div>
                
                <div>
                    <div>登録がまだであればこちらから</div>
                    <div class="m-1">
                        <a href="{{ route('register')}}" class="btn btn-success">
                            登録
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('layout.footer')