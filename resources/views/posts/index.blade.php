@extends('layouts.app')

@section('title','NOW FOOD')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Corben:700">
<link rel = 'stylesheet' type='text/css' href="{{ asset('/css/style.css') }}">
@endsection

@section('js')
<script src="{{ asset('/js/gunaviAPI.js') }}"></script>
<script src="{{ asset('/js/save.js') }}"></script>
@endsection


@section('content')
  
    <!-- {{-- carousel section --}} -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <img class="d-block  carousel-image" src="{{ asset('/img/和風.jpg') }}" alt="和風">
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block  carousel-image" src="{{ asset('/img/イタリアン.jpg') }}" alt="イタリアン">
        </div>
        <div class="carousel-item">
          <img class="d-block  carousel-image" src="{{ asset('/img/中華料理.jpg') }}" alt="中華料理">
        </div>
        <div class="carousel-item">
          <img class="d-block  carousel-image" src="{{ asset('/img/寿司.jpg') }}" alt="寿司">
        </div>
        <div class="carousel-item">
          <img class="d-block  carousel-image" src="{{ asset('/img/親子丼.jpg.webp') }}" alt="丼物">
        </div>
      </div>
    </div>
    
    
    
    <!-- {{-- main section --}} -->
    <div class="search">
      <div class="container my-2">
        <form name='mainform' method = 'GET' class="col-12">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-12">
              <div class="row">
  
                <div class="cp_ipselect cp_sl04 col">
                  <select id = range>
                    <option value='1'>300m</option>
                    <option value='2'>500m</option>
                    <option value='3'>1000m</option>
                    <option value='4'>2000m</option>
                    <option value='4'>3000m</option>
                  </select>
                </div>
    
                <div class="input-group col">
                  <input type="text" id = 'result' disabled="disabled" value="" class="form-control" placeholder="現在地取得">
                  <input type="hidden" id = 'latitude' value="" class="form-control">
                  <input type="hidden" id = 'longitude' value="" class="form-control">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-primary"onclick="getyorpositon();"><i class="fas fa-location-arrow"></i></button>
                  </span>
                </div>
              
              </div>
            </div>
  
            <div class="input-group text-center col">
              <input type="text" id = 'freeword' class="form-control" placeholder="フリーワード検索" value="{{ Auth::id() }}">
              <span class="input-group-btn">
                <button type="button" class="btn btn-primary"onclick="gnaviFreewordSearch(offset=1, hit_per_page=20);"><i class="fas fa-search-plus"></i></button>
              </span>
            </div>
          </div>
        </form>
      </div>
     </div>
  
  
     <div class="container-fluid result">
        <div class="row justify-content-center"id = 'shops'>
          <div class="row justify-content-center" id="shops">
            <div class="col-sm-10 col-xl-7" id="shopinfo0"><div class="card text-white bg-dark mb-5">
              <div class="row justify-content-center">
                <div class="col-5 pr-0">
                  <img class="card-img w-100 h-100" src="https://rimage.gnst.jp/rest/img/5gvk1mmp0000/t_007m.jpg" alt="no image">
                </div>
                <div class="col-7 card-body-padding">
                  <div class="card-body">
                    <h5 class="card-title">炙りにく寿司食べ放題 個室居酒屋 灯 名駅店</h5>
                    <h6>&lt;最寄り駅&gt;ＪＲ 名古屋駅</h6>
                    <div class="card-content border-success border-top border-bottom">
                    <p class="card-text">【臨時休業のお知らせ】 5/11(月)～5/31(日) 名古屋駅から徒歩1分の好立地 ■食べ飲み放題2500円＆炙りにく寿司食べ放題スタート♪</p>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal_1">
                      店舗情報はこちら
                    </button>
                    <div id="favorite">
                      <form action="">
                        <input type="hidden" id="user_id" value="{{ Auth::id() }}" >
                        <input type="hidden" id="restaurant_name" value="炙りにく寿司食べ放題 個室居酒屋 灯 名駅店">
                        <input type="hidden" id="restaurant_intro_short" value="【臨時休業のお知らせ】 5/11(月)～5/31(日) 名古屋駅から徒歩1分の好立地 ■食べ飲み放題2500円＆炙りにく寿司食べ放題スタート♪">
                        <input type="hidden" id="restaurant_intro_long" value="◆名駅★海底個室大小宴会まで幅広く対応可フロアごと貸切・丸ごと貸切などご要望にお答えします会場下見もOK◆名駅★季節の宴会コース、フードメニューがリニューアル♪さらに美味しくなりました！ 各種コースは100種超の2時間制飲み放題付！└ 7品 3500円⇒スタンダード！└ 8品 4000円⇒大満足！！└ 9品 4500円⇒贅沢に！！※平日限定お得コースあり！飲み放題付き2800円☆◆東海ウォーカーで紹介されました！【ステーキフォンデュ】食べ放題！2480円肉厚ステーキを濃厚チーズにとろ～り絡ませて召し上がれ※金,土,祝前日は2980円でご提供">
                        <input type="hidden" id="restaurant_image" value="https://rimage.gnst.jp/rest/img/5gvk1mmp0000/t_007m.jpg">
                        <input type="hidden" id="restaurant_address" value="〒450-0002 愛知県名古屋市中村区名駅3-15-8 グルメプラザ3F">
                        <input type="hidden" id="access_line" value="ＪＲ" >
                        <input type="hidden" id="access_station" value="名古屋駅">
                        <input type="hidden" id="restaurant_access_walk" value="3">
                        <input type="hidden" id="restaurant_tell" value="050-3463-5637">
                        <input type="hidden" id="restaurant_opentime" value="15:00～23:00(L.O.22:30、ドリンクL.O.22:30)">
                        <input type="hidden" id="restaurant_holiday" value="年末年始（2020年1月1日）">
                        <input type="hidden" id="restaurant_budget" value="2980">
                        <input type="hidden" id="restaurant_budget_lunch" value="1000">
                        <input type="hidden" id="restaurant_credit_card" value="VISA,MasterCard,UC,DC,UFJ,ダイナースクラブ,アメリカン・エキスプレス,JCB,NC,MUFG">
                        <input type="hidden" id="restaurant_e_money" value="PITAPA">
                        <input type="hidden" id="restaurant_url" value="https://r.gnavi.co.jp/n989700/?ak=xzLvWXywAN6eO8g4XTTk%2FSg6H%2FdfdZm8Aua6gp1gpAA%3D" v-model="restaurant_url">
                      <button type="button" class="btn btn-primary mt-2" @click="favorite">
                        保存
                      </button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            
            <div class="modal fade " id="exampleModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content  bg-dark text-white">
                  <div class="modal-header border-success border-bottom">
                    <h5 class="modal-title" id="exampleModalLabel">炙りにく寿司食べ放題 個室居酒屋 灯 名駅店</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body border-success border-bottom">
                  <img class="mb-2 w-100 h-100" src="https://rimage.gnst.jp/rest/img/5gvk1mmp0000/t_007m.jpg">
                  <p>&lt;店舗紹介&gt;</p>
                  <p class="border-success border-top border-bottom">
                    ◆名駅★海底個室
                    大小宴会まで幅広く対応可
                    フロアごと貸切・丸ごと貸切などご要望にお答えします
                    会場下見もOK
                    ◆名駅★季節の宴会
                    コース、フードメニューがリニューアル♪さらに美味しくなりました！
                    各種コースは100種超の2時間制飲み放題付！
                    └ 7品 3500円⇒スタンダード！
                    └ 8品 4000円⇒大満足！！
                    └ 9品 4500円⇒贅沢に！！
                    ※平日限定お得コースあり！飲み放題付き2800円☆
                    ◆東海ウォーカーで紹介されました！【ステーキフォンデュ】食べ放題！2480円
                    肉厚ステーキを濃厚チーズにとろ～り絡ませて召し上がれ♪
                    ※金,土,祝前日は2980円でご提供</p>
                  <p>&lt;住所&gt;</p>
                  <p class="border-success border-bottom">〒450-0002 愛知県名古屋市中村区名駅3-15-8 グルメプラザ3F</p>
                  <p>&lt;アクセス&gt;</p>
                  <p class="border-success border-bottom">ＪＲ 名古屋駅 3分</p>
                  <p>&lt;電話番号&gt;</p>
                  <p class="border-success border-bottom">050-3463-5637</p>
                  <p>&lt;営業時間&gt;</p>
                  <p class="border-success border-bottom"> 15:00～23:00(L.O.22:30、ドリンクL.O.22:30)  ⚠休業日 年末年始（2020年1月1日）</p>
                  <p>&lt;予算&gt;</p>
                  <p class="border-success border-bottom">平均予算:2980  ランチ平均予算:</p>
                  <p>&lt;カード・電子マネー&gt;</p>
                  <p>カード:VISA,MasterCard,UC,DC,UFJ,ダイナースクラブ,アメリカン・エキスプレス,JCB,NC,MUFG</p>
                  <p>電子マネー:</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <a href="https://r.gnavi.co.jp/n989700/?ak=xzLvWXywAN6eO8g4XTTk%2FSg6H%2FdfdZm8Aua6gp1gpAA%3D">
                    <button type="button" class="btn btn-primary">ご予約はこちらから</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo0'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo01'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo2'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo3'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo4'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo5'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo6'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo7'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo8'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo9'>
          </div>
        </div>
      </div>
  
    
    <div class="container my-5">
      <div class="row justify-content-center"id = 'shops'>
        <div id="next">
        </div>
      </div>
    </div>
  
  
  
    <!-- {{-- footer section --}} -->
    <footer class="footer text-center bg-warning fixed-bottom mt-5">
      <p>Supported by <a href="https://api.gnavi.co.jp/api/scope/" target="_blank"><img class="footer-logo my-1" src="{{ asset('/img/ぐるなび.jpg') }}" alt=""></a></p>
    </footer>
  
  
  
@endsection