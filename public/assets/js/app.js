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
		setInterval(getNewNotifications, 3000);
	}

});
