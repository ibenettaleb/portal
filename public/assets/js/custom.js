var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
	nonSelectedListLabel: 'Non-selected',
  	selectedListLabel: 'Selected',
  	preserveSelectionOnMove: 'moved',
  	moveOnSelect: false
});

$(".preloader").fadeOut(2000, function() {
	$(".content").fadeIn(2000);
});

$(document).on('click', 'button#create', function () {
    $("#selectspace").css("display", "block");
});

$(document).on('click', 'button#update', function () {
    $("#selectspace2").css("display", "block");
});

$(document).ready(function () {
	if (window.location.pathname == '/project/'+windowvar.id+'/edit') {
        var $options = $('#data option');
        i = 0;
        size = windowvar.selectedDepartment.length;
        for(i; i<size; i++){
        	if (windowvar.selectedDepartment[i]['id'] == 1) {
            	$options.filter('[value="'+windowvar.selectedDepartment[i]['id']+'"]').prop('disabled', true);
            }
            else {
                $options.filter('[value="'+windowvar.selectedDepartment[i]['id']+'"]').prop('selected', true);
			}
        }
	}
	$('.js-example-basic-multiple').select2();
});


$("#jquery-search-sample").jsearch({
  rowClass: '.jsearch-row',
  fieldClass: '.jsearch-field',
  minLength: 1,
  triggers: 'keyup',
  caseSensitive: false
});

$('[data-toggle="popover"]').popover();

$('.custom-file-input').on('change',function(){
  $(this).next('.form-control-file').addClass("selected").html($(this).val());
});

$(function () {
    $('.truncate-title').succinct ({
        size: 35
    });
    $('.truncate-description').succinct ({
        size: 70
    });
});

$('.alert-success').fadeIn().delay(4000).fadeOut('slow');

$(document).on('click', 'button#delete', function(e) {
	e.preventDefault();
    var id = $(this).data('id');
	swal({
	  title: "Are you sure?",
	  text: "You want delete this APP!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm){
	  if (isConfirm) {
	    swal("Deleted!", "Your APP has been deleted.", "success");
	    $.ajax({
            type: "GET",
            url: './destroy',
            data: {id:id, "_token":"{{ csrf_token() }}"},
            success: function (data) {
                location.reload ();
            }         
        });
	  } 
	  else {
	    swal("Cancelled", "Your APP is safe :)", "error");
	  }
	});
});


