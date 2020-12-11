$(document).ready(function(e){
	$("#login").click(function() {
		let email = $("#username-input").val();
		let password = $("#password-input").val();

		$.ajax({
			type: 'POST',
			url: './controller/login_controller.php', 
			data : { 
				"email" : email, 
				"password" : password 
			},
			success: function(data, textStatus, jqXHR) {
				if (data == 'logged') {
					window.location = './view/home.php';
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert("Error couldn't send the informations");
			}
		});
	})
});