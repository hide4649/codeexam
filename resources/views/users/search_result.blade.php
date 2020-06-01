@extends('layouts.app')

@section('title','検索結果' )

@section('css')
<link rel = 'stylesheet' type='text/css' href="{{ asset('/css/search_result.css') }}">
@endsection


@section('header')
  <form method="post" action="{{ route('search',$user)}}"class="form-inline my-2">
    {{ csrf_field() }}
    <input type="text" class="form-control mr-sm-2" name="search" value="" placeholder="入力してください" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
@endsection


<!-- {{-- main section --}} -->
@section('content')
<div class="container-fluid result">
  
  
    <div class="row justify-content-center">
      <div class="col-5 bg-light py-2 mt-4 text-center">
        <h4>{{ $search_result }}</h4>
      </div>
    </div>
  
      

            @forelse ( $posts as $post )
              <div class="container-fluid result mt-4">
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-xl-7">
                    <div class="card text-white bg-dark mb-5">
                      <div class="row justify-content-center">
                        <div class="col-5 pr-0">
                          <img class="card-img w-100 h-100" src="{{ $post->restaurant_image }}"  onerror="this.src='{{ asset('/img/noimage.jpg') }}'; this.removeAttribute('onerror'); this.removeAttribute('onload');"
                          onload="this.removeAttribute('onerror'); this.removeAttribute('onload');" alt="no image">
                        </div>
                        <div class="col-7 card-body-padding">
                          <div class="card-body">
                            <h5 class="card-title">{{ $post->restaurant_name }}</h5>
                            <h6>{{ $post->restaurant_access_line_station }}</h5>
                            <div class="card-content border-success border-top border-bottom">
                             <p class="card-text">{{ $post->restaurant_intro_short }}</p>
                            </div>
                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal_{{ $post->id }}">
                              店舗情報はこちら
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
          
                    <div class="modal fade " id="exampleModal_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog " role="document">
                        <div class="modal-content  bg-dark text-white">
                          <div class="modal-header border-success border-bottom">
                            <h5 class="modal-title">{{ $post->restaurant_name }}</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body border-success border-bottom">
                            <img class="mb-2 w-100 h-100" src="{{ $post->restaurant_image }}" >
                            <p><店舗紹介></p>
                            <p class="border-success border-top border-bottom">{{ $post->restaurant_intro_long }}</p>
                            <p><住所></p>
                            <p class="border-success border-bottom">{{ $post->restaurant_address }}</p>
                            <p><アクセス></p>
                            <p class="border-success border-bottom">{{ $post->restaurant_access_line_station_walk }}</p>
                            <p><電話番号></p>
                            <p class="border-success border-bottom">{{ $post->restaurant_tell }}</p>
                            <p><営業時間></p>
                            <p class="border-success border-bottom">{{ $post->restaurant_opentime_holiday }}</p>
                            <p><予算></p>
                            <p class="border-success border-bottom">{{ $post->restaurant_budget }}</p>
                            <p><カード・電子マネー></p>
                            <p>{{ $post->restaurant_credit_card }}</p>
                            <p>{{ $post->restaurant_e_money }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <a href = {{ $post->restaurant_url }}>
                            <button type="button" class="btn btn-primary">ご予約はこちらから</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            @empty

              <div class="container mt-5">
                <div class="row">
                  <div class="col-xl-12 text-center">
                    <h1 class="bg-light">該当するものはございません</h1>
                  </div>
                </div>
              </div>

            @endforelse
          </div>
        </div>
      </div>
    </div>
    @if (!empty($posts))
      
      <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
      </div>

   @endif
</div>


@endsection