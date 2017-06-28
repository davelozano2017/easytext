var site_url = 'http://localhost/easytext/';
function register() {
  $(document).ready(function(){
    $("#register").submit(function(event) {
       event.preventDefault();
       var form = $(this);
       $.ajax({
         url:  site_url + 'execute/createuser',
         type: 'post',
         data: form.serialize(),
         dataType: 'json',
         processData: false,
         success:function(response) {
           if(response.success === true) {
           $('form#register')[0].reset();
           } else {
             $.each(response.messages, function(key,value){
               var element = $('#' + key);
               element.closest('div.form-group')
               .find('.label-danger').remove();
               element.after(value);
             });
           }
         }
       });
     });
  });
}

function login() {
  $(document).ready(function(){

  });
}

function recover_step_1() {
  $(document).ready(function(){

  });
}

login();
register();
recover_step_1();
