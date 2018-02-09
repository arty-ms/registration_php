function login_toggle(element){
  if (!($(element).attr('class') === 'active')){
    $('#confirmationpassword').toggle();
    $('#username').toggle();
    console.log();
    $('#loginsbmt').val($(element).attr('id').toUpperCase());
    make_active(element);
  }
}

function make_active(element){
  $('.header .active').toggleClass('active');
  $(element).toggleClass('active');
}

$(document).ready(function() {


})