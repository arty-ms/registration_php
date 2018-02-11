function login_toggle(element){
  if (!($(element).attr('class') === 'active')){
    ['#confirmationpassword', '#name', '#email', 'label'].map(function(elem){
      $(elem).toggle();
      $(elem).val('');});    
    $('#loginsbmt').val($(element).attr('id').toUpperCase());
    make_active(element);
  }
}

function make_active(element){
  $('.header .active').toggleClass('active');
  $(element).toggleClass('active');
}

$(document).ready(function() {
$('#loginsbmt').click(function(){
  var url = $('#loginsbmt').val().toLowerCase() + ".php";
  var regData = $("#myForm").serializeArray();
  console.log(regData);
  $.ajax({
    type: 'POST',
    url: url,
    data: regData,
    error: function(req, text, error) {
      alert('Error AJAX: ' + text + ' | ' + error);
    },
    success: function (data) {
     alert(data);
    },
    dataType: 'text'
    });
  });
})