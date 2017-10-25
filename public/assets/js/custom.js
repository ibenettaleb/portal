let demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
    nonSelectedListLabel: 'Non-selected',
    selectedListLabel: 'Selected',
    preserveSelectionOnMove: 'moved',
    moveOnSelect: false
});

$(document).ready(function () {
    let $container = $('#allApp');
    $('.portfolioFilter a').click(function () {
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');

        let selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });
    $('#search').click(function(){
        let qsRegex;
        let $allApp = $container.isotope({
            itemSelector: '.element-item',
            layoutMode: 'masonry',
            filter: function () {
                return qsRegex ? $(this).text().match( qsRegex ) : true;
            }
        });
        //use value of search field to filter
        let $quicksearch = $('.quicksearch').keyup( debounce( function () {
            qsRegex = new RegExp( $quicksearch.val(), 'gi' );
            $allApp.isotope();
        }, 200 ) );
        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            let timeout;
            return function debounced() {
                if ( timeout ) {
                    clearTimeout( timeout );
                }
                function delayed() {
                    fn();
                    timeout = null;
                }
                timeout = setTimeout( delayed, threshold || 100 );
            }
        }
        console.log('>>>>>>>>>>>>> ', $quicksearch, '>>>>>>>>>> ', qsRegex);
    });
});

$(".preloader").fadeOut(2000, function () {
    $(".content").fadeIn(2000);
});

$(document).on('click', 'button#create', function () {
    $("#selectspace").css("display", "block");
});

$(document).on('click', 'button#update', function () {
    $("#selectspace2").css("display", "block");
});

$(document).ready(function () {
    if (window.location.pathname == '/app/' + windowvar.id + '/edit') {
        var $options = $('#data option');
        i = 0;
        size = windowvar.selectedDepartment.length;
        for (i; i < size; i++) {
            if (windowvar.selectedDepartment[i]['id'] == 1) {
                $options.filter('[value="' + windowvar.selectedDepartment[i]['id'] + '"]').prop('disabled', true);
            }
            else {
                $options.filter('[value="' + windowvar.selectedDepartment[i]['id'] + '"]').prop('selected', true);
            }
        }
    }
    $('.js-example-basic-multiple').select2();
    $('[rel="tooltip"]').tooltip();
    $(".inputCategory").hide();
    $(".showInput").click(function () {
        $(".inputCategory").show();
        $(".InputToFocus").focus();
    });
    $(".hideInput").click(function () {
        $(".inputCategory").hide();
        $(".RestInput").val("");
    });
    $(".inputCategory2").hide();
    $(".showInput2").click(function () {
        $(".inputCategory2").show();
        $(".InputToFocus2").focus();
    });
    $(".hideInput2").click(function () {
        $(".inputCategory2").hide();
        $(".RestInput2").val("");
    });
});

$('[data-toggle="popover"]').popover();

$('.custom-file-input').on('change', function () {
    $(this).next('.form-control-file').addClass("selected").html($(this).val());
});

$(function () {
    $('.truncate-title').succinct({
        size: 35
    });
    $('.truncate-description').succinct({
        size: 70
    });
    $('.truncate-description-hover').succinct({
        size: 285
    });
});

$('.alert-success').fadeIn().delay(4000).fadeOut('slow');

$(document).on('click', 'button#create', function () {
    $("#selectspace").css("display", "block");
});

$(document).on('click', 'button#delete', function (e) {
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
        function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your APP has been deleted.", "success");
                $.ajax({
                    type: "GET",
                    url: './destroy',
                    data: {id: id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
            else {
                swal("Cancelled", "Your APP is safe :)", "error");
            }
        });
});

function markNotificationAsRead(notificationCount) {
    if (notificationCount !== '0') {
        $.get('/markAsRead');
    }
}








