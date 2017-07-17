var site_url = 'http://localhost/easytext/';
function register() {
  $(document).ready(function(){
    $("#register").submit(function(event) {
      $('button#register').html('Please Wait').attr('disabled',true);
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
           success(response.message);
           $('button#register').html('Register').attr('disabled',false);
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

/* Sending security code via phone Start */

function recoverviaphonestep1() {
  $('#recover_via_phone_step_1').click(function(e){
    $('#recover_via_phone_step_1').html('Please wait').attr('disabled',true);
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
          $('#recover_via_phone_step_1').html('Recover Password').attr('disabled',false);
          setTimeout(function(){
             location.href = site_url + 'phone-security-code';
          },3000);
          } else if(response.page == 'recovery') {
            error(response.message);
            $('#recover_via_phone_step_1').html('Recover Password').attr('disabled',false);
          }  else {
          $('#recover_via_phone_step_1').html('Recover Password').attr('disabled',false);
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
  $('#recover_via_phone_step_2').click(function(e){
    $('#recover_via_phone_step_2').html('Please wait').attr('disabled',true);
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
          location.href = site_url + 'phone-change-password';
        } else if(response.page == 'step2') {
          error(response.message);
          $('#recover_via_phone_step_2').html('Verify').attr('disabled',false);
        } else {
          $('#recover_via_phone_step_2').html('Verify').attr('disabled',false);
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
  $('#recover_via_phone_step_3').click(function(e){
    $('#recover_via_phone_step_3').html('Please wait').attr('disabled',true);
    e.preventDefault();
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphoneoremailstep3',
      cache: false,
      data: form,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          success(response.message);
          $('#recover_via_phone_step_3').html('Save Chagnes').attr('disabled',false)
          setTimeout(function(){
            location.href = site_url + 'login';
          },3000);
        } else {
          $('#recover_via_phone_step_3').html('Save Changes').attr('disabled',false);
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


function resendviaphone() {
  $('#resend').click(function(){
    $('#recover_via_phone_step_2').html('Please Wait').attr('disabled',true);
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
          $('#recover_via_phone_step_2').html('Verify').attr('disabled',false);
        }
      } 
    })
  });
}

/* Sending security code via phone End */

/* Sending security code via email Start */

function recoverviaemailstep1() {
  $('#recover_via_email_step_1').click(function(e){
    $('#recover_via_email_step_1').html('Please wait').attr('disabled',true);
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaemailstep1',
      data: form,
      dataType:'json',
      cache: false,
      success:function(response) {
          if(response.success === true) {
          success(response.message);
          $('#recover_via_email_step_1').html('Recover Password').attr('disabled',false);
          setTimeout(function(){
             location.href = site_url + 'email-security-code';
          },3000);
          } else if(response.success == false) {
            error(response.message);
            $('#recover_via_email_step_1').html('Recover Password').attr('disabled',false);
          } else if(response.page == 'recovery') {
            error(response.message);
            $('#recover_via_email_step_1').html('Recover Password').attr('disabled',false);
          }  else {
          $('#recover_via_email_step_1').html('Recover Password').attr('disabled',false);
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

function recoverviaemailstep2() {
  $('#recover_via_email_step_2').click(function(e){
    $('#recover_via_email_step_2').html('Please wait').attr('disabled',true);
    e.preventDefault();
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaemailstep2',
      cache: false,
      data: form,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          location.href = site_url + 'email-change-password';
        } else if(response.page == 'step2') {
          error(response.message);
          $('#recover_via_email_step_2').html('Verify').attr('disabled',false);
        } else {
          $('#recover_via_email_step_2').html('Verify').attr('disabled',false);
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

function recoverviaemailstep3() {
  $('#recover_via_email_step_3').click(function(e){
    $('#recover_via_email_step_3').html('Please wait').attr('disabled',true);
    e.preventDefault();
    var form = $('form').serialize();
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/recoverviaphoneoremailstep3',
      cache: false,
      data: form,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          success(response.message);
          $('#recover_via_email_step_3').html('Save Chagnes').attr('disabled',false)
          setTimeout(function(){
            location.href = site_url + 'login';
          },3000);
        } else {
          $('#recover_via_email_step_3').html('Save Changes').attr('disabled',false);
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


function resendviaemail() {
  $('#resendemail').click(function(){
    $('#recover_via_email_step_2').html('Please Wait');
    $.ajax({
      type: 'POST',
      url : site_url + 'execute/sendemail',
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
          $('#recover_via_email_step_2').html('Verify');
        }
      } 
    })
  });
}

/* Sending security code via email End */


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


recoverviaphonestep1();
recoverviaphonestep2();
recoverviaphonestep3();
resendviaphone();

recoverviaemailstep1();
recoverviaemailstep2();
recoverviaemailstep3();
resendviaemail();

login();
register();
choose_method();
