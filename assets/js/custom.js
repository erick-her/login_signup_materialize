$(document).ready(function(){
  // Set a default date for datepicker
  var default_date = new Date("January 1, 2000");

  // Call to predefined materialize function datepicker
  $('.datepicker').datepicker({
    defaultDate: default_date,
    showClearBtn: true
  });

  // Validate if passwords match
  $("input[name=password]").change(function() {
    $("input[name=confirm_password]").attr('pattern', $(this).val());
  });
});
