$(document).ready(function(){

  var url = 'http://localhost:8000/';

  // Validate if passwords match
  $("input[name=password]").change(function() {
    $("input[name=confirm_password]").attr('pattern', $(this).val());
  });

  // Phone number validation
  $('input[name=phone]').blur(function(){
    phone = $(this).val();
    phone = phone.replace(/[^0-9]/g,'');
    if(phone.length != 10){
      $("input[name=phone]").addClass('invalid');
    }
  });

  // Submit form function.
  $('#btnSignup').click(function(){
    // Get values of each input
    var form = $('form');
    var first_name = form.find('input[name="first_name"]').val().trim();
    var last_name = form.find('input[name="last_name"]').val().trim();
    var phone_number = form.find('input[name="phone"]').val();
    var email = form.find('input[name="email"]').val().trim();
    var password = form.find('input[name="password"]').val().trim();
    var confirm_password = form.find('input[name="confirm_password"]').val().trim();

    var form_method = form.attr('method'); // get form method
    var form_action = form.attr('action'); // get form action

    // Phone number validation on submit
    phone_number = phone_number.replace(/[^0-9]/g,'');
    if(phone_number.length != 10){
      $("input[name=phone]").addClass('invalid');
      return false;
    }

    // Email validation
    var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\. \-]+\.[a-zA-z0-9]{2,4}$/;
    if(!(email.match(regex))){
      $("input[name=email]").addClass('invalid');
      return false;
    }

    // Validate if fields are empty
    if(first_name == '' && last_name == '' && phone_number == '' && email == '' && password == '' && confirm_password == ''){
      $('input').addClass('invalid');
      return false; // so form isn't submitted
    }

    // Check to see if first name is empty
    else if(first_name == ''){
      $('#first_name_input input').addClass('invalid');
      return false;
    }

    // Check to see if last name is empty
    else if(last_name == ''){
      $('#last_name_input input').addClass('invalid');
      return false;
    }

    // Check to see if phone number is empty
    else if(phone_number == ''){
      $('#phone_number_input input').addClass('invalid');
      return false;
    }

    // Check to see if email is empty
    else if(email == ''){
      $('#email_input input').addClass('invalid');
      return false;
    }

    // Check to see if password is empty
    else if(password == ''){
      $('#password_input input').addClass('invalid');
      return false;
    }

    // Check to see if confirm password is empty
    else if(confirm_password == ''){
      $('#confirm_password_input input').addClass('invalid');
      return false;
    }

    // Check to see if passwords match on submit
    else if(password != confirm_password){
      $('#confirm_password_input input').addClass('invalid');
      return false;
    }

    // If form fields are not empty submit form
    else{
      $.ajax({
        type: form_method,
        url: url + form_action,
        data: {first_name:first_name, last_name:last_name, phone:phone_number, email:email, password:password},
        timeout: 3000
      }).done(function(data){
        if(data == 'success'){
          var toastHTML = '<span>Successfully signed up!</span><a href="../index.html" class="btn-flat toast-action">Signin</button>';
          M.toast({html: toastHTML});
        }else{
           M.toast({html: data});
        }
      });
    }

  });

});
