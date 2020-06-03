var latitude = '';
var longitude= '';

function getyorpositon(){
    navigator.geolocation.getCurrentPosition(function(pos) {

    latitude = pos.coords.latitude;
    longitude = pos.coords.longitude;
    if(latitude && longitude){
      document.getElementById("result").value = "現在地が取得できました";
    }else{
      document.getElementById("location_error").classList.remove('d-none');
      document.getElementById("location_error_message").textContent = "位置情報の設定を確認してください";
    }
  });
}



function gnaviFreewordSearch(offset, hit_per_page){
    
    var req = new XMLHttpRequest();
    var keyid = "9520c6838a4f82f8cb7389cbbc1d7215";
    var lat = latitude;
    var lng = longitude;
    var freeword = document.forms.mainform.elements['freeword'].value
    var range = document.forms.mainform.elements['range'].value
    var url = `https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=${keyid}&latitude=${lat}&longitude=${lng}&range=${range}&freeword=${freeword}&offset=${offset}&hit_per_page=${hit_per_page}`;
  

    req.responseType = 'json';
    
    req.open('GET', url, true);

    
    req.onload = function(){
      for(i = 0; i < hit_per_page; i++){
      //APIで取得した店の名前と画像を表示
      //それぞれをぐるなびのサイトにリンクしている

       var number = document.getElementById("shopinfo").childNodes[i].id;
       document.getElementById("shopinfo").childNodes[i].innerHTML 
        = `<div class="card text-white bg-dark mb-5">
            <div class="row justify-content-center" id="favorite_${number}">
              <div class="col-5 pr-0">
                <img class="card-img w-100 h-100" src="${req.response.rest[i].image_url.shop_image1}" onerror="this.src='https://192.168.99.101/img/noimage.jpg'; this.removeAttribute('onerror'); this.removeAttribute('onload');"
                onload="this.removeAttribute('onerror'); this.removeAttribute('onload');" alt="no image">
              </div>
              <div class="col-7 card-body-padding">
                <div class="card-body">
                  <h5 class="card-title" id="restaurant_name_${number}">${req.response.rest[i].name}</h5>
                  <h6 id="restaurant_access_line_station_${number}"><最寄り駅>${req.response.rest[i].access.line} ${req.response.rest[i].access.station}</h5>
                  <div class="card-content border-success border-top border-bottom">
                  <p class="card-text" id="restaurant_intro_short_${number}">${req.response.rest[i].pr.pr_short }</p>
                  </div>
                  <div class="conteiner text-center mt-1">
                   <span id="message_suceess_${number}" class="alert-suceess"></span>
                   <span id="message_alert_${number}" class="alert-danger"></span>
                  </div>
                  <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal_${number}">
                    店舗情報はこちら
                  </button>
                  <button type="button" class="btn btn-primary mt-2" @click="favorite_${number}" onclick="get_${number}();">
                    保存
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade " id="exampleModal_${number}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content  bg-dark text-white">
                <div class="modal-header border-success border-bottom">
                  <h5 class="modal-title" id="exampleModalLabel" >${req.response.rest[i].name}</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body border-success border-bottom">
                <img id="restaurant_image_${number}" class="mb-2 w-100 h-100" src = "${req.response.rest[i].image_url.shop_image1}" onerror="this.src='https://192.168.99.101/img/noimage.jpg'; this.removeAttribute('onerror'); this.removeAttribute('onload');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
                <p><店舗紹介></p>
                <p id="restaurant_intro_long_${number}" class="border-success border-top border-bottom">${req.response.rest[i].pr.pr_long }</p>
                <p><住所></p>
                <a href="https://maps.google.co.jp/maps/search/${req.response.rest[i].address}" target="_blank">
                <p class="border-success border-bottom" id="restaurant_address_${number}">${req.response.rest[i].address}</p>
                <p><アクセス></p></a>
                <p class="border-success border-bottom" id="restaurant_access_line_station_walk_${number}">${req.response.rest[i].access.line} ${req.response.rest[i].access.station} ${req.response.rest[i].access.walk}分</p>
                <p><電話番号></p>
                <a href="tel:${req.response.rest[i].tel}"><p class="border-success border-bottom" id="restaurant_tell_${number}">${req.response.rest[i].tel}</p></a>
                <p><営業時間></p>
                <p class="border-success border-bottom" id="restaurant_opentime_holiday_${number}">${req.response.rest[i].opentime}  ⚠休業日 ${req.response.rest[i].holiday}</p>
                <p><予算></p>
                <p class="border-success border-bottom" id="restaurant_budget_${number}">平均予算:${req.response.rest[i].budget}  ランチ平均予算:${req.response.rest[i].lunch}</p>
                <p><カード・電子マネー></p>
                <p id="restaurant_credit_card_${number}">カード:${req.response.rest[i].credit_card}</p>
                <p id="restaurant_e_money_${number}">電子マネー:${req.response.rest[i].e_money}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                  <a href = ${req.response.rest[i].url} target="_blank" id="restaurant_url_${number}">
                  <button type="button" class="btn btn-primary">ご予約はこちらから</button></a>
                </div>
              </div>
            </div>
          </div>`;
      

          if(i > 9){
            document.getElementById('next').innerHTML =`<nav aria-label="Page navigation example">
            <ul class="pagination">;
              <li class="page-item"><a class="page-link" href="#" onclick="gnaviFreewordSearch(offset-=hit_per_page, hit_per_page);">前へ</a></li>
              <li class="page-item"><a class="page-link" href="#" onclick="gnaviFreewordSearch(offset+=hit_per_page, hit_per_page);">次へ</a></li>
            </ul>
          </nav>`;
          }
        }
    };
    req.onerror = function(e){
      document.getElementById("research_error").classList.remove('d-none');
      document.getElementById("research_error_message").textContent = "ページを読み込んでからもう一度お試しください";
    }
    req.send();
}