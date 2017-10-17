new Vue ({

	el: '#app',

	data: {
		allNotifications: []
	},

	methods: { },

	ready: function() {
		var self = this;
		var getNewNotifications = function () {
		$.get('/Notifications', function(Response) {
			self.allNotifications = Response;
			$('#countNotiy').text(self.allNotifications.length);
		});
		};
		setInterval(getNewNotifications, 2000);

		Vue.filter('myOwnTime', function (value) {
            return moment(value).fromNow();
        });
        Vue.filter('myMonth', function(value) {
        	return moment(value).format("MMM Do YY");
        })
	}

});
