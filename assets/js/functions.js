var site_url = 'http://localhost/easytext/';
function register() {
  $(document).ready(function(){
    $("#register").submit(function(event) {
      $('button#register').html('Please Wait').attr('disabled',true);
       event.preventDefault();
       var form = $(this);
       $.ajax({
         url:  site_url + 'executecreateaccount/createuser',
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
    $('button#login').click(function(e){
      $('button#login').html('Please Wait').attr('disabled',true);
      var form = $('form').serialize();
      $.ajax({
        type: 'POST',
        url: site_url + 'execute/login',
        data: form,
        cache: false,
        dataType: 'json',
        success:function(response) {
          if(response.success == true) {
            location.href = site_url + 'profile';
          } else {
            $('button#login').html('Sign In').attr('disabled',false);
            error(response.message);
          }
        }
      });
    });
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

function updateprofile($id) {
  var id = $id;
  var form = $('form').serialize();
  $('#update').html('Please Wait').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: site_url + 'execute/memberupdateprofile/'+id,
    data: form,
    dataType: 'json',
    cache: false,
    success:function(response) {
      if(response.success == true) {
        $('#update').html('Save').attr('disabled',false);
        success(response.message);
      } else {
        $('#update').html('Save').attr('disabled',false);
        $.each(response.messages, function(key,value){
          var element = $('#' + key);
          element.closest('div.form-group')
          .find('.label-danger').remove();
          element.after(value);
        });
      }
    }
  });
}

function changepassword($id) {
  var id = $id;
  var form = $('form').serialize();
  $('#update').html('Please Wait').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: site_url + 'execute/memberchangepassword/'+id,
    data: form,
    dataType: 'json',
    cache: false,
    success:function(response) {
      if(response.success == true) {
        $('#update').html('Save').attr('disabled',false);
        success(response.message);
      } else {
        $('#update').html('Save').attr('disabled',false);
        $.each(response.messages, function(key,value){
          var element = $('#' + key);
          element.closest('div.form-group')
          .find('.label-danger').remove();
          element.after(value);
        });
      }
    }
  });
}

function memberaddcontact() {
  $('#addcontact').click(function(e){
    e.preventDefault();
    var button = $('#addcontact');
    var form = $('form').serialize();
    button.html('Please Wait').attr('disabled',true);
    $.ajax({
      type: 'POST',
      url: site_url + 'execute/addcontact',
      data: form,
      cache: false,
      dataType: 'json',
      success:function(response){
        if(response.success == true) {
          button.html('Add').attr('disabled',false);
          success(response.message);
        } else if(response.success == false) {
          button.html('Add').attr('disabled',false);
          error(response.message);
        } else {
          button.html('Add').attr('disabled',false);
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
      url : site_url + 'executecreateaccount/sendemail',
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
       delay : 2000,
      'position'  :'top right',
      'outEffect' :'slideBottom'
      
  }); 
}

function showcontacts() {
  $.ajax({
    type: 'POST',
    url: site_url + 'show-contacts',
    cache: false,
    success:function(data) {
      $('#show').html(data);
    }
  });
}

function blocklisting($id) {
  var id = $id;
  $.ajax({
    type: 'POST',
    url: site_url + 'execute/blocklisting/'+id,
    cache:false,
    dataType: 'json',
    success:function(response) {
      if(response.success == true) {
        success(response.message);
        showcontacts();
      }
    }
  })
}

function delete_contact($id) {
    var id = $id;
    amarancondition(id);
}

function amarancondition(id){
  $.amaran({
  'theme'     :'colorful',
  'content'   :{ bgcolor:'#336699', color:'#fff',
  message: 'Are you sure you want to remove this contact? <br><br> <a id="yes'+id+'" class="btn btn-info" onclick="remove_contact('+id+')"> Yes</a> <a id="close'+id+'" class="btn btn-warning"> No</a>',
  },
  'position'  :'top right', 'outEffect' :'slideBottom','sticky' :true, 'closeOnClick'  :false
  });
  $('#close'+id).click(function(){
     closenotify();
  });
  $('#yes'+id).click(function(){
     closenotify();
  })
}

function closenotify(){
  $.amaran({
    'theme'     :'colorful',  
    message: '',
    'delay' : 1,
    'closeOnClick'  :true
  });
}

function remove_contact(id) {
  $.ajax({
    type:'POST',
    url: site_url + 'execute/removecontact/'+id,
    dataType: 'json',
    cache: false,
    success:function(response) {
      if(response.success == true) {
        showcontacts();
      }
    }
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

memberaddcontact();
showcontacts();

login();
register();
choose_method();
