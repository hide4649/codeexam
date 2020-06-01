@extends('layouts.app')

@section('title','NOW FOOD')

@section('css')
<link rel = 'stylesheet' type='text/css' href="{{ asset('/css/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('/js/gunaviAPI.js') }}"></script>
<script src="{{ asset('/js/shopinfo_1_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_2_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_3_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_4_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_5_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_6_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_7_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_8_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_9_save.js') }}"></script>
<script src="{{ asset('/js/shopinfo_10_save.js') }}"></script>
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
              <input type="text" id = 'freeword' class="form-control" placeholder="フリーワード検索" value="">
              <span class="input-group-btn">
                <button type="button" class="btn btn-primary"onclick="gnaviFreewordSearch(offset=1, hit_per_page=20);"><i class="fas fa-search-plus"></i></button>
              </span>
            </div>
          </div>
        </form>
      </div>
     </div>
  
  
     <div class="container-fluid result">
        <div class="row justify-content-center" id = 'shopinfo'>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_1'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_2'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_3'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_4'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_5'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_6'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_7'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_8'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_9'>
          </div>
          <div class="col-sm-10 col-xl-7" id = 'shopinfo_10'>
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