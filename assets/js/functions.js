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

function choose_method() {
  $('button#method').click(function(){
    var method = $('select').val();
    if(method == 'phone') {
      location.href = site_url+'recover-via-phone';
    } else {
      location.href = site_url+'recover-via-email';
    }
  })
}

function recoverviaphonestep1() {
  $('#recover_step_1').click(function(e){
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphonestep1',
      data: form,
      dataType:'json',
      cache: false,
      success:function(response) {
           if(response.success === true) {
           $('form#recoverviaphone')[0].reset();
           } else {
             alert(response.message)
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
} 

recoverviaphonestep1();
login();
register();
choose_method();
