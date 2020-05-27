@extends('layouts.app')

@section('title','マイページ' )

@section('css')
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

<!-- {{-- main section --}} -->
@section('content')
<div class="container text-center mb-auto">
  
    
      <div class="col bg-light py-2 mt-4">
        {{ $user->name }} さんのお気に入り一覧
      </div>
      

            @forelse ( $user->posts as $post )
             <div class="container-fluid result mt-4">
                <div class="row justify-content-center"id = 'shops'>
                  <div class="col-sm-10 col-xl-7" id = 'shopinfo0'>
                    <div class="card text-white bg-dark mb-5">
                      <div class="row justify-content-center">
                        <div class="col-5 pr-0">
                          <img class="card-img w-100 h-100" src="{{ asset('/storage/restaurant_images'.$post->restaurant_image) }}" onerror="this.src='{{ asset('/img/noimage.jpg') }}'; this.removeAttribute('onerror'); this.removeAttribute('onload');"
                          onload="this.removeAttribute('onerror'); this.removeAttribute('onload');" alt="no image">
                        </div>
                        <div class="col-7 card-body-padding">
                          <div class="card-body">
                            <h5 class="card-title">{{ $post->restaurant_name }}</h5>
                            <h6><最寄り駅>{{ $post->access_line }} {{ $post->access_station }}</h5>
                            <div class="card-content border-success border-top border-bottom">
                            <p class="card-text">{{ $post->restaurant_intro_short }}</p>
                            </div>
                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal_${[i]}">
                              店舗情報はこちら
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
              
                    <div class="modal fade " id="exampleModal_${[i]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog " role="document">
                        <div class="modal-content bg-dark text-white">
                          <div class="modal-header border-success border-bottom">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $post->restaurant_name }}</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body border-success border-bottom">
                          <img class="mb-2 w-100 h-100" src="{{ asset('/storage/restaurant_images'.$post->restaurant_image) }}">
                          <p><店舗紹介></p>
                          <p class="border-success border-top border-bottom">{{ $post->restaurant_intro_long }}</p>
                          <p><住所></p>
                          <p class="border-success border-bottom">{{ $post->restaurant_address }}</p>
                          <p><アクセス></p>
                          <p class="border-success border-bottom">{{ $post->restaurant_access_line }} {{ $post->restaurant_access_station }} {{ $post->restaurant_access_walk }}分</p>
                          <p><電話番号></p>
                          <p class="border-success border-bottom">{{ $post->restaurant_tell }}</p>
                          <p><営業時間></p>
                          <p class="border-success border-bottom">{{ $post->restaurant_opentime }}  ⚠休業日 {{ $post->restaurant_holiday }}</p>
                          <p><予算></p>
                          <p class="border-success border-bottom">平均予算:{{ $post->restaurant_budget }}  ランチ平均予算:{{ $post->restaurant_lunch }}</p>
                          <p><カード・電子マネー></p>
                          <p>カード:{{ $post->restaurant_credit_card }}</p>
                          <p>電子マネー:{{ $post->restaurant_e_money }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <a href = "{{ $post->restaurant_url }}">
                            <button type="button" class="btn btn-primary">ご予約はこちらから</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
              </div>        

            @empty

              <div class="container null">
              <div class="row">
                <div class="col-xl-12 text-center">
                  <h1 class="bg-light">まだお気に入りはありません</h1>
                </div>
              </div>
              </div>

            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection