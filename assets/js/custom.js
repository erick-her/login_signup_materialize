// Set a default date for datepicker
var default_date = new Date("January 1, 2000");

// Call to predefined materialize function datepicker
$('.datepicker').datepicker({
  defaultDate: default_date,
  showClearBtn: true
});
