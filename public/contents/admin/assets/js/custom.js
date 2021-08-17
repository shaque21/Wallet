//Image upload code start
$(document).ready(function() {
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#view_img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#upload").change(function() {
  readURL(this);
  });

  $('.uploadbtn').on('click', function() {
  $('#upload').trigger('click');

  });
});
//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal_body #modal_id").val( deleteID );
	});

	$(document).on("click", "#restore", function () {
		 var restoreID = $(this).data('id');
		 $(".modal_body #modal_id").val( restoreID );
	});

	$(document).on("click", "#delete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal_body #modal_id").val( deleteID );
	});
});

//Success and Error Message Timeout Code Start
setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
 },5000);

setTimeout(function() {
    $('.alerterror').slideUp(1000);
 },10000);

//print code start
$(document).ready(function(){
    $('.btnPrint').printPage();
});

//datatable code start
$(document).ready(function() {
  $('#myTable').DataTable();

  $('#alltableinfo').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": false,
    "info": true,
    "autoWidth": false
  });

  $('#allTableDesc').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "order": [[ 0, "desc" ]],
    "info": true,
    "autoWidth": false
  });
});

//Datepicker setting code start
 $(function(){
	 $('#myDatePicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});
});
