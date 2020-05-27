<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b3157441e0.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
  @yield('css')
  <title>@yield('title')</title>
</head>


<body class="d-flex flex-column" style="min-height: 100vh">

<!-- {{-- header section --}} -->
    {{-- <header class="sticky-top bg-warning text-center">
      <h3><i class="fas fa-utensils"></i>NOW FOOD<i class="fas fa-utensils"></i></h3>
      <p>～現在地から「美味しい」が見つかる～</p>
    </header> --}}
  <!-- {{-- header section --}} -->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
    <a href="{{ url('/')}}" class="navbar-brand"><h3><i class="fas fa-utensils"></i>NOW FOOD<i class="fas fa-utensils"></i></h3></a>
    <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#home">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="home">
      <ul class="navbar-nav mr-auto mt-lg-0">
        <li class="nav-item active">
          <a href="{{ url('/')}}" class="nav-link"><i class="fas fa-th"></i>ホーム</a>
        </li>
          
        @auth
          
          <div class="dropdown">
            <button class="btn  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-sign-in-alt mr-1"></i>{{ Auth::user()->name }} さん
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('mypage', Auth::user()->id) }}">お気に入り一覧</a>
              <a class="dropdown-item" href="{{ route('editprofile',$user ?? '') }}">
              ユーザー情報編集</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </div>
          
        @else

          <li class="nav-item">
            <a class="nav-link" href="{{ url('register') }}"><i class="fas fa-user"></i>新規登録</a>
          </li>

          <li class="nav-item">
            <a data-target="#loginModal" data-toggle="modal" class="nav-link"><i class="fas fa-user"></i>ログイン</a>
          </li>

        @endauth
      </ul>
    </div>
  </nav>

  <!-- {{-- login section --}} -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content login">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">ログイン</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body" id="login">
          <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}


            <div class="form-group">
              <label for="email">メールアドレス</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail" aria-describedby="emailHelp" placeholder="example@email.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus v-model="email">
              <small id="emailHelp" class="form-text text-muted"></small>
              <div class="mt-3">
                <span class="alert alert-danger" v-text="errors.email" v-if="errors.email"></span>
              </div>
            </div>


            <div class="form-group">
              <label for="password">パスワード</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="LoginPassword" name="password" required autocomplete="current-password" v-model="password">
              <div class="mt-3">
              <span class="alert alert-danger" v-text="errors.password" v-if="errors.password"></span>
              </div>
            </div>


            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" v-model="remember">
              <label class="form-check-label" for="exampleCheck1" name="remember" id="LoguinRemember" {{ old('remember') ? 'checked' : '' }} v-model="remember">次回から自動的にログイン</label>
            </div>


            <button type="submit" class="btn btn-primary" @click.prevent="login">ログイン</button>

            @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                パスワードをお忘れですか？
              </a>
            @endif
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button data-toggle="modal" data-target="#registerModal" type="button" class="btn btn-primary">新規登録</button>
        </div>
      </div>
    </div>
  </div>


  <!-- {{-- main section --}} -->
   @yield('content')
  



  @yield('js')
  <style>
    body{
  	background-image: url(/img/レストラン風景.jpg);
	  background-attachment: fixed;
	  background-size: 100% 100%;
    }
  </style>
</body>
<script src="{{ asset('/js/login.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>