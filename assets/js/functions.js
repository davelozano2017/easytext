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
    $('#recover_step_1').html('Please wait').attr('disabled',true);
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphonestep1',
      data: form,
      dataType:'json',
      cache: false,
      success:function(response) {
          if(response.success === true) {
          success(response.message);
          $('#recover_step_1').html('Recover Password').attr('disabled',false);
          setTimeout(function(){
             location.href = site_url + 'recover-via-phone-insert-security-code';
          },3000);
          } else if(response.page == 'recovery') {
            error(response.message);
            $('#recover_step_1').html('Recover Password').attr('disabled',false);
          }  else {
          $('#recover_step_1').html('Recover Password').attr('disabled',false);
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

function recoverviaphonestep2() {
  $('#recover_step_2').click(function(e){
    $('#recover_step_2').html('Please wait').attr('disabled',true);
    e.preventDefault();
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphonestep2',
      cache: false,
      data: form,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          location.href = site_url + 'recover-via-phone-change-password';
        } else if(response.page == 'step2') {
          error(response.message);
          $('#recover_step_2').html('Verify').attr('disabled',false);
        } else {
          $('#recover_step_2').html('Verify').attr('disabled',false);
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

function recoverviaphonestep3() {
  $('#recover_step_3').click(function(e){
    $('#recover_step_3').html('Please wait').attr('disabled',true);
    e.preventDefault();
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphonestep3',
      cache: false,
      data: form,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          success(response.message);
          $('#recover_step_3').html('Save Chagnes').attr('disabled',false)
          setTimeout(function(){
            location.href = site_url + 'login';
          },5000);
        } else {
          $('#recover_step_3').html('Save Changes').attr('disabled',false);
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

function error(message) {
    $.amaran({
      'theme'     :'colorful',
      'content'   :{
        bgcolor:'#ff0000',
        color:'#fff',
        message: message
      },
      'position'  :'top right',
      'outEffect' :'slideBottom'
  }); 
}

function success(message) {
 $.amaran({
      'theme'     :'colorful',
      'content'   :{
        bgcolor:'#336699',
        color:'#fff',
        message: message
      },
      'position'  :'top right',
      'outEffect' :'slideBottom'
  }); 
}

function resendviaphone() {
  $('#resend').click(function(){
    $('#recover_step_2').html('Please Wait').attr('disabled',true);
    $.ajax({
      type: 'POST',
      url : site_url + 'execute/resendsecuritycodeviaphone',
      dataType: 'Json',
      cache: false,
      success:function(response) {
        if(response.success == true) {
          $.amaran({
              'theme'     :'colorful',
              'content'   :{
                bgcolor:'#336699',
                color:'#fff',
                message: response.message
              },
              'position'  :'top right',
              'outEffect' :'slideBottom'
          }); 
          $('#recover_step_2').html('Verify').attr('disabled',false);
        }
      } 
    })
  });
}

recoverviaphonestep1();
recoverviaphonestep2();
recoverviaphonestep3();
resendviaphone();

login();
register();
choose_method();
