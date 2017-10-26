let demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
    nonSelectedListLabel: 'Non-selected',
    selectedListLabel: 'Selected',
    preserveSelectionOnMove: 'moved',
    moveOnSelect: false
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
    $(window).on('load', function () {
        let qsRegex;
        let buttonFilter;

        $('.portfolioFilter a').click(function () {
            $container = $('#allApp').isotope({
                itemSelector: '.element-item',
                animationOptions: {
                    duration: 200,
                    easing: 'linear',
                    queue: false
                },
                layoutMode: 'masonry',
                filter: function () {
                    let $this = $(this);
                    let searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                    let buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                    return searchResult && buttonResult;
                }
            });
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            buttonFilter = $(this).attr('data-filter');
            $container.isotope();
        });

        //use value of search field to filter
        let $quicksearch = $('.quicksearch').on('paste copy cut keyup keydown', debounce(function () {
            $container = $('#allApp').isotope({
                itemSelector: '.element-item',
                animationOptions: {
                    duration: 200,
                    easing: 'linear',
                    queue: false
                },
                layoutMode: 'masonry',
                filter: function () {
                    let $this = $(this);
                    let searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                    let buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                    return searchResult && buttonResult;
                }
            });
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            $container.isotope();
        }, 200));

        // debounce so filtering doesn't happen every millisecond
        function debounce(fn, threshold) {
            let timeout;
            return function debounced() {
                if (timeout) {
                    clearTimeout(timeout);
                }

                function delayed() {
                    fn();
                    timeout = null;
                }

                timeout = setTimeout(delayed, threshold || 100);
            }
        }
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
