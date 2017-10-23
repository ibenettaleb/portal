new Vue({

    el: '#app',

    data: {
        allNotifications: [],
        countNotify: 0
    },

    methods: {},

    ready: function () {
        let self = this;
        let getNewNotifications = function () {
            $.get('/Notifications', function (Response) {
                self.allNotifications = Response;
                self.countNotify = self.allNotifications.length;
            });
        };
        setInterval(getNewNotifications, 2000);

        Vue.filter('myOwnTime', function (value) {
            return moment(value).fromNow();
        });
        Vue.filter('myMonth', function (value) {
            return moment(value).format("MMM Do YY");
        })
    }

});
