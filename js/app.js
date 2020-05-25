function getyorpositon(){
  navigator.geolocation.getCurrentPosition(function(pos) {
    // Geolocation APIのコールバック関数
    // console.log(pos);
    var lat = pos.coords.latitude;
    var lng = pos.coords.longitude;
    document.getElementById("latitude").value = lat;
    document.getElementById("longitude").value = lng;
    var req = new XMLHttpRequest();
    var appid = "AIzaSyAvz1BK-7cFFPBOZEW4Q1gfceW1AF78jAA"
    var url = `https://maps.googleapis.com/maps/api/geocode/json?appid=${appid}&latitude=${lat}&longitude=${lng}`;
  

    req.responseType = 'json';
    
    req.open('GET', url, true);

    req.onload = function(){
      document.getElementById('address').value = req.response.pref_name;
    }

    req.send();
  })
}

function gnaviFreewordSearch(offset, hit_per_page){
    // Geolocation APIのコールバック関数
    // console.log(pos);
    var req = new XMLHttpRequest();
    var keyid = "9520c6838a4f82f8cb7389cbbc1d7215";
    var lat = document.forms.mainform.elements['latitude'].value
    var lng = document.forms.mainform.elements['longitude'].value
    var freeword = document.forms.mainform.elements['freeword'].value
    var range = document.forms.mainform.elements['range'].value
    var url = `https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=${keyid}&latitude=${lat}&longitude=${lng}&range=${range}&freeword=${freeword}&offset=${offset}&hit_per_page=${hit_per_page}`;
  

    req.responseType = 'json';
    
    req.open('GET', url, true);

    req.onload = function(){
      for(i = 0; i < hit_per_page; i++){
      //APIで取得した店の名前と画像を表示
      //それぞれをぐるなびのサイトにリンクしている

      document.getElementById("shops").childNodes[i].innerHTML 
      = `<div class="card text-white bg-dark mb-5">
            <div class="row justify-content-center">
              <div class="col-5 pr-0">
                <img class="card-img w-100 h-100" src="${req.response.rest[i].image_url.shop_image1}" alt="no image">
              </div>
              <div class="col-7 card-body-padding">
                <div class="card-body">
                  <h5 class="card-title">${req.response.rest[i].name}<br>${req.response.rest[i].access.line} ${req.response.rest[i].access.station}</h5>
                  <p class="card-text">${req.response.rest[i].pr.pr_short }</p>
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal_${[i]}">
                    店舗情報はこちら
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade " id="exampleModal_${[i]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">${req.response.rest[i].name}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <img class="mb-2 w-100 h-100" src = ${req.response.rest[i].image_url.shop_image1}>
                <p><店舗紹介></p>
                <p>${req.response.rest[i].pr.pr_long }</p>
                <p><住所></p>
                <p>${req.response.rest[i].address}</p>
                <p><アクセス></p>
                <p>${req.response.rest[i].access.line} ${req.response.rest[i].access.station} ${req.response.rest[i].access.walk}分</p>
                <p><電話番号></p>
                <p>${req.response.rest[i].tel}</p>
                <p><営業時間></p>
                <p>${req.response.rest[i].opentime} 　⚠休業日 ${req.response.rest[i].holiday}</p>
                <p><予算></p>
                <p>平均予算:${req.response.rest[i].budget}  ランチ平均予算:${req.response.rest[i].lunch}</p>
                <p><カード・電子マネー></p>
                <p>カード:${req.response.rest[i].credit_card}</p>
                <p>電子マネー:${req.response.rest[i].e_money}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                  <a href = ${req.response.rest[i].url}>
                  <button type="button" class="btn btn-primary">ご予約はこちらから</button></a>
                </div>
              </div>
            </div>
          </div>`;
          if(i > 9){
            document.getElementById('next').innerHTML ='<a href = "#" onclick="gnaviFreewordSearch(offset+=hit_per_page, hit_per_page);">次の結果</a><a href = "#" onclick="gnaviFreewordSearch(offset-=hit_per_page, hit_per_page);">前の結果</a>';
          }
        }
    };
    req.send();
}
      