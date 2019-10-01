$('#add').click(function() {

var fname = $('#fname').val().trim(),
	lname = $('#lname').val().trim(),
	user_name = $('#user_name').val().trim(),
	email_id = $('#email_id').val().trim(),
	password = $('#password').val().trim(),
	gender = $('#gender').val().trim(),


if(fname && lname && user_name && email_id && gender && password){


	var formdata = new FormData();
	formdata.append('fname',fname);
	formdata.append('lname',lname);
	formdata.append('user_name',user_name);
	formdata.append('email_id',email_id);
	formdata.append('password',password);
	formdata.append('gender',gender);

	$.ajax({

		type: "POST",
		url: apiurl + '/user_details/form1_add.php',
		success: function(data){
			console.log('done');
			window.location.reload();
		},
		error: function(error){
			console.log('error');
		},
		dataType: 'json',
		processData: false,
		contentType: false

	});

}
	else{
		alert('please enter all fiels');
	}

});



}









)}