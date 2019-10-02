function login() {
	// alert('hi');

	var user_name = $('#user_name').val().trim();
	var password = $('#password').val().trim();

	if (user_name && password) {
		if ((user_name.length <= 4)) {
			alert('Enter username greater than 6 characters');
		}
		if ((password.length <= 4)) {
			alert('Enter password greater than 8 characters');
		}
		if (user_name.length > 4 && password.length > 4) {

			var data = {
				'user_name': user_name,
				'password': password,
			};

			$.ajax({
				type: "POST",
				url: 'http://localhost/CANZONA/backend/login.php',
				data: data,
				success: function(data) {
					// console.log('done');
					console.log(data);
					if (data[1].login) {
						// Nav.assign('../frontend/canzona.html');
						alert("login successful");
						window.location.assign("canzona.html");
						// setData('user', JSON.stringify(data));
					} else {
						alert('Wrong user credentials');
					}
					// Nav.assign('home.html')
				},
			 error: function(error) {
				 // console.log(error);
			 },
			 dataType: 'json'
			});
		}
	} else {
		alert('Please enter all the fields');
	}

};




