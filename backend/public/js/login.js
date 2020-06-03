new Vue({
  el: '#login',
  data: {
      email: '',
      password: '',
      remember: false,
      errors: {}
  },
  methods: {
      login: function(){

          this.errors = {};

          var self = this;
          var url = '/login';
          var params = {
              email: this.email,
              password: this.password,
              remember: this.remember,
          };
          axios.post(url, params).then(function(response){
                 location.href = '/';
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
