function gnaviFreewordSearch(offset, hit_per_page){
  navigator.geolocation.getCurrentPosition(function(pos) {
    // Geolocation APIのコールバック関数
    // console.log(pos);
    var lat = pos.coords.latitude;
    var lng = pos.coords.longitude;
    var req = new XMLHttpRequest();
    var keyid = "9520c6838a4f82f8cb7389cbbc1d7215";
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
              <div class="col-md-4">
                <img class="card-img" src="${req.response.rest[i].image_url.shop_image1}" alt="no image">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">${req.response.rest[i].name}<br>${req.response.rest[i].access.line} ${req.response.rest[i].access.station}</h5>
                  <p class="card-text">${req.response.rest[i].pr.pr_short }</p>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_${[i]}">
                    店舗情報はこちら
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exampleModal_${[i]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">${req.response.rest[i].name}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <img src = ${req.response.rest[i].image_url.shop_image1}>
                <br>
                <p>${req.response.rest[i].address}</p>
                <br>
                <p>${req.response.rest[i].tel}</p>
                <br>
                <p>${req.response.rest[i].opentime}</p>
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
  })
}
      