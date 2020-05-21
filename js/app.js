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
    url = `https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=${keyid}&latitude=${lat}&longitude=${lng}&range=${range}&freeword=${freeword}&offset=${offset}&hit_per_page=${hit_per_page}`
  
  
    req.responseType = 'json';
    
    req.open('GET', url, true)

    req.onload = function(){
      for(i = 0; i < hit_per_page; i++){
    //APIで取得した店の名前と画像を表示
      //それぞれをぐるなびのサイトにリンクしている
      document.getElementById("shops").childNodes[i].innerHTML 
      = `<a href = ${req.response.rest[i].url}><img src = ${req.response.rest[i].image_url.shop_image1}  ||"image\noimage.png"><br>${req.response.rest[i].name}</a><br><p>${req.response.rest[i].access.line} ${req.response.rest[i].access.station}</p>`
    // ${req.response.rest[i].image_url.shop_image1}
    // ${req.response.rest[i].address}
    // ${req.response.rest[i].tel}
    // ${req.response.rest[i].opentime}
      }
    };
    req.send();
  })
}