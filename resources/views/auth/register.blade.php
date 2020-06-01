@extends('layouts.app')

@section('title','新規登録' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection


@section('content')

@section('content')
<div class="container mt-4 mb-auto">
  <div class="row">
    <div class="col-sm text-left">
      <label class="newRegister">新規登録</label>
    </div>
    <div class="col-sm text-right">
    <a href="{{url('/')}}">
      <button type="button" class="btn btn-outline-light border-dark text-dark">戻る</button>
    </a>
    </div>
  </div>

        <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
         
          <div class="form-group">
            <label for="exampleuser1">ユーザー（8文字以内）</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleuser1"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="example@email.com" name="email" value="{{ old('email') }}"required autocomplete="email">
            <small id="emailHelp" class="form-text text-muted"></small>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="Confirmation password">確認用パスワード</label>
            <input type="password" class="form-control" id="Confirmation password" name="password_confirmation" required autocomplete="new-password">
          </div>


          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">次回から自動的にログイン</label>
          </div>
          
          <div class="conteiner">
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary">登録</button>
                </div>
                <div class="col text-right">
                  <button data-target="#loginModal" data-toggle="modal" type="button" class="btn btn-primary ">ログイン</button>
                </div>
              </div>
            </div>
          
        </form>
          
    </div>
  </div>
</div>

@endsection
