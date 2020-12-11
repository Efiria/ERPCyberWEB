$(document).ready(function(e){
	$("#add-user").click(function() {
		let username = $("#username-input").val();
        let email = $("#email-input").val();
        let password1 = $("#password1-input").val();
        let password2 = $("#password2-input").val();
        let role = $("#role-input").val();
        
        if (password1 != password2) {
            alert('The password are not matching..')
        } else {
            $.ajax({
                type: 'POST',
                url: '../controller/employee_controller.php', 
                data : { 
                    "username" : username, 
                    "email" : email,
                    "password1" : password1,
                    "role" : role
                },
                success: function(data, textStatus, jqXHR) {
                    if(data == "success") {
                        document.location.reload();
                    }else{
                        alert(data)
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error couldn't send the informations");
                }
            });
        }
	})
});