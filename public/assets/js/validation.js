$(function () {

    $.validator.setDefaults ({
        errorClass: 'text-danger float-left',
        highlight: function(element) {
            $(element)
                .closest('input-group')
                .addClass('has-warning');
        },
        unhighlight: function(element) {
            $(element)
                .closest('input-group')
                .removeClass('has-warning');
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }
    });

    $("#createForm").validate ({
        rules: {
            title: {
                required: true
            },
            link: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: 'Please enter a title.'
            },
            link: {
                required: 'Please enter a link.'
            },
            description: {
                required: 'Please enter a description.'
            }
        }
    });
});
