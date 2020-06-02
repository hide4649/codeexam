function get_shopinfo_2(){
  var restaurant_name = document.getElementById('restaurant_name_shopinfo_2').textContent;
  var restaurant_intro_short = document.getElementById('restaurant_intro_short_shopinfo_2').textContent;
  var restaurant_intro_long = document.getElementById('restaurant_intro_long_shopinfo_2').textContent;
  var restaurant_image = document.getElementById('restaurant_image_shopinfo_2').src;
  var restaurant_address = document.getElementById('restaurant_address_shopinfo_2').textContent;
  var restaurant_access_line_station = document.getElementById('restaurant_access_line_station_shopinfo_2').textContent;
  var restaurant_access_line_station_walk = document.getElementById('restaurant_access_line_station_walk_shopinfo_2').textContent;
  var restaurant_tell = document.getElementById('restaurant_tell_shopinfo_2').textContent;
  var restaurant_opentime_holiday = document.getElementById('restaurant_opentime_holiday_shopinfo_2').textContent;
  var restaurant_budget = document.getElementById('restaurant_budget_shopinfo_2').textContent;
  var restaurant_credit_card = document.getElementById('restaurant_credit_card_shopinfo_2').textContent;
  var restaurant_e_money = document.getElementById('restaurant_e_money_shopinfo_2').textContent;
  var restaurant_url = document.getElementById('restaurant_url_shopinfo_2').href; 

new Vue({
  el: '#shopinfo_2',
  data: {
      restaurant_name: restaurant_name, 
      restaurant_intro_short: restaurant_intro_short, 
      restaurant_intro_long: restaurant_intro_long, 
      restaurant_image: restaurant_image, 
      restaurant_address: restaurant_address, 
      restaurant_access_line_station: restaurant_access_line_station, 
      restaurant_access_line_station_walk: restaurant_access_line_station_walk,  
      restaurant_tell: restaurant_tell, 
      restaurant_opentime_holiday: restaurant_opentime_holiday, 
      restaurant_budget: restaurant_budget,  
      restaurant_credit_card: restaurant_credit_card, 
      restaurant_e_money: restaurant_e_money, 
      restaurant_url: restaurant_url,
      errors: {}
  },
  methods: {
    favorite_shopinfo_2: function(){
          this.errors = {};

          var self = this;
          var url = '/posts';
          var params = {
            restaurant_name: this.restaurant_name, 
            restaurant_intro_short: this.restaurant_intro_short, 
            restaurant_intro_long: this.restaurant_intro_long, 
            restaurant_image: this.restaurant_image, 
            restaurant_address: this.restaurant_address, 
            restaurant_access_line_station: this.restaurant_access_line_station, 
            restaurant_access_line_station_walk: this.restaurant_access_line_station_walk,
            restaurant_tell: this.restaurant_tell, 
            restaurant_opentime_holiday: this.restaurant_opentime_holiday, 
            restaurant_budget: this.restaurant_budget, 
            restaurant_credit_card: this.restaurant_credit_card, 
            restaurant_e_money: this.restaurant_e_money, 
            restaurant_url: this.restaurant_url,

          };
          var axiosPost = axios.create({
              xsrfCookieName: "XSRF-TOKEN",
              withCredentials: true
          });
          axiosPost.post(url, params).then(function(response){
                $success = response.data["success"];
                $alert = response.data["alert"];
                if($success){
                  document.getElementById(`message_suceess_shopinfo_2`).textContent = $suceess;
                }else{
                  if($alert){
                    document.getElementById(`message_alert_shopinfo_2`).textContent = $alert;
                  }
                }
              })
              .catch(function(error){
                
              });
      }
  }
  });
  var restaurant_name = '';
  var restaurant_intro_short = '';
  var restaurant_intro_long = '';
  var restaurant_image = '';
  var restaurant_address = '';
  var restaurant_access_line_station = '';
  var restaurant_access_line_station_walk = '';
  var restaurant_tell = '';
  var restaurant_opentime_holiday = '';
  var restaurant_budget = '';
  var restaurant_credit_card = '';
  var restaurant_e_money = '';
  var restaurant_url = ''; 
};