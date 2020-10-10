$a = jQuery.noConflict()

$a(function () {
  $a("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update');
});