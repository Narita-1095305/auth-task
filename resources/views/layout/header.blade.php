@section('header')
<header class="sticky-top">
<nav class="navbar navbar-dark bg-dark">
    <a href="/" class="navbar-brand">課題管理システム</a>
    <div>
        @if(Auth::check())
          <span class="text-white">ようこそ, {{ Auth::user()->name }}さん</span>
          <span class="text-white"> | </span>
          <a href="#" onclick="event.preventDefault();
          document.getElementById('logout').submit();">ログアウト</a>
          <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            
          </form>
        @else
          <a class="text-white" href="{{ route('login') }}">ログイン</a>
          <span class="text-white"> | </span>
          <a class="text-white" href="{{ route('register') }}">会員登録</a>
        @endif
    </div>
</nav>
</header>
@endsection