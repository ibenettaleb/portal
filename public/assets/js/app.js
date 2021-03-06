new Vue({

    el: '#app',

    data: {
        allNotifications: [],
        allCategory: [],
        countNotify: 0
    },

    methods: {
        //mark All as Read
        markNotificationAsRead: function(notificatoinCount) {
            let self = this;
            if (notificatoinCount !== '0') {
                $.get('/markAsRead');
            }
            $('#notification').removeClass('badge1');
            $.get('/Notifications', function (Response) {
                self.allNotifications = Response;
                self.countNotify = self.allNotifications.length;
            });
        }
    },

    ready: function () {
        let self = this;

        //get All Notifiction
        let getNewNotifications = function () {
            $.get('/Notifications', function (Response) {
                self.allNotifications = Response;
                self.countNotify = self.allNotifications.length;
                if (self.countNotify == 0) {
                    $('#notification').removeClass('badge1');
                }
            });
        };

        setTimeout(getNewNotifications, 200);

        //Hover Event to get All Notify
        $("#refresh__button").hover(getNewNotifications);

        Vue.filter('myOwnTime', function (value) {
            return moment(value).fromNow();
        });
        Vue.filter('myMonth', function (value) {
            return moment(value).format("MMM Do YY");
        });

        //get All Category
        $.get('/getCategory', function (Response) {
            self.allCategory = Response;
        });

        //start - Create Category
        $('#category__error').hide();
        $('#create__category').click(submit__category);
        $('#createCategory').find('input').keydown(keypressed);
        function submit__category(event) {
            let values = null;
            event.preventDefault();
            values = $('#category__input').val();
            if (values) {
                do__submit('#output', values);
            } else {
                $('#category__error').show();
                setTimeout(function () {
                    $('#category__error').hide();
                }, 3000);
            }
        }

        function keypressed(event) {
            let charcode = (event.which) ? event.which : window.event.keyCode;
            if (charcode === 13) {
                return submit__category(event);
            }
            return true;
        }

        function do__submit(submit_output, submit_values) {
            $(submit_output).hide();
            let posting = $.post(
                "/createCategory", {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'category_value': submit_values
                }, function () {
                    $('#category__input').val('');
                    $('#myModalCategory').modal('hide');
                });
            $.get('/getCategory', function (Response) {
                self.allCategory = Response;
            });
        }
        //end - Create Category
    }

});
