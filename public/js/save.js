var user_id = document.getElementById('user_id').value;
var restaurant_name = document.getElementById('restaurant_name').value;
var restaurant_intro_short = document.getElementById('restaurant_intro_short').value;
var restaurant_intro_long = document.getElementById('restaurant_intro_long').value;
var restaurant_image = document.getElementById('restaurant_image').value;
var restaurant_address = document.getElementById('restaurant_address').value;
var access_line = document.getElementById('access_line').value;
var access_station = document.getElementById('access_station').value;
var restaurant_access_walk = document.getElementById('restaurant_access_walk').value;
var restaurant_tell = document.getElementById('restaurant_tell').value;
var restaurant_opentime = document.getElementById('restaurant_opentime').value;
var restaurant_holiday = document.getElementById('restaurant_holiday').value;
var restaurant_budget = document.getElementById('restaurant_budget').value;
var restaurant_budget_lunch = document.getElementById('restaurant_budget_lunch').value;
var restaurant_credit_card = document.getElementById('restaurant_credit_card').value;
var restaurant_e_money = document.getElementById('restaurant_e_money').value;
var restaurant_url = document.getElementById('restaurant_url').value;
new Vue({
  el: '#favorite',
  data: {
      user_id: user_id, 
      restaurant_name: restaurant_name, 
      restaurant_intro_short: restaurant_intro_short, 
      restaurant_intro_long: restaurant_intro_long, 
      restaurant_image: restaurant_image, 
      restaurant_address: restaurant_address, 
      access_line: access_line, 
      access_station: access_station, 
      restaurant_access_walk: restaurant_access_walk, 
      restaurant_tell: restaurant_tell, 
      restaurant_opentime: restaurant_opentime, 
      restaurant_holiday: restaurant_holiday, 
      restaurant_budget: restaurant_budget, 
      restaurant_budget_lunch: restaurant_budget_lunch, 
      restaurant_credit_card: restaurant_credit_card, 
      restaurant_e_money: restaurant_e_money, 
      restaurant_url: restaurant_url,
      errors: {}
  },
  methods: {
    favorite: function(){

          this.errors = {};

          var self = this;
          var url = '/posts';
          var params = {
            user_id: this.user_id, 
            restaurant_name: this.restaurant_name, 
            restaurant_intro_short: this.restaurant_intro_short, 
            restaurant_intro_long: this.restaurant_intro_long, 
            restaurant_image: this.restaurant_image, 
            restaurant_address: this.restaurant_address, 
            access_line: this.access_line, 
            access_station: this.access_station, 
            restaurant_access_walk: this.restaurant_access_walk, 
            restaurant_tell: this.restaurant_tell, 
            restaurant_opentime: this.restaurant_opentime, 
            restaurant_holiday: this.restaurant_holiday, 
            restaurant_budget: this.restaurant_budget, 
            restaurant_budget_lunch: this.restaurant_budget_lunch, 
            restaurant_credit_card: this.restaurant_credit_card, 
            restaurant_e_money: this.restaurant_e_money, 
            restaurant_url: this.restaurant_url,
          };
          var axiosPost = axios.create({
              xsrfCookieName: "XSRF-TOKEN",
              withCredentials: true
          })
          axiosPost.post(url, params).then(function(response){
                  document.getElementById(`a`).innerHTML =``;
              })
              .catch(function(error){
                if (error.response.status === 422) {
                  var responseErrors = error.response.data.errors;
                  var errors = {};
                  for(var key in responseErrors) {
                      errors[key] = responseErrors[key][0];
                  }
                  self.errors = errors;
                } else {
                  console.log("もう一度お試しください", error.response);
                }
              });
      }
  }
  });