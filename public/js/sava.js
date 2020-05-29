new Vue({
  el: '#favorite',
  data: {
      user_id: '', 
      restaurant_name: '', 
      restaurant_intro_short: '', 
      restaurant_intro_long: '', 
      restaurant_image: '', 
      restaurant_address: '', 
      access_line: '', 
      access_station: '', 
      restaurant_access_walk: '', 
      restaurant_tell: '', 
      restaurant_opentime: '', 
      restaurant_holiday: '', 
      restaurant_budget: '', 
      restaurant_budget_lunch: '', 
      restaurant_credit_card: '', 
      restaurant_e_money: '', 
      restaurant_url: '',
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
                  location.href = '/home';
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