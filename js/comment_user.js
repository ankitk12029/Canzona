function submits() {
	// alert('hi');

	var uid = $('#uid').val().trim();
	var comments = $('#comments').val().trim();

	// if (user_name && password) {
	// 	if ((user_name.length <= 4)) {
	// 		alert('Enter username greater than 6 characters');
	// 	}
	// 	if ((password.length <= 4)) {
	// 		alert('Enter password greater than 8 characters');
	// 	}
	// 	if (user_name.length > 4 && password.length > 4) {

			var data = {
				'uid': uid,
				'comments': comments,
			// };

			$.ajax({
				type: "POST",
				url: 'http://localhost/Canzona/backend/comment_user.php',
				data: data,
				success: function(data) {
					// console.log('done');
					console.log(data);
					if (data[1].submits) {
						// Nav.assign('../frontend/canzona.html');
						alert("login successful");
						window.location.assign("reveiw.html");
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
