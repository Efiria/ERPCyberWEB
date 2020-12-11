$(document).ready(function(e){
	$("#add-user").click(function() {
		let firstname = $("#firstname-input").val();
        let lastname = $("#lastname-input").val();
        let address = $("#address-input").val();
        let country = $("#country-input").val();
        
        $.ajax({
            type: 'POST',
            url: '../controller/customer_controller.php', 
            data : { 
                "firstname" : firstname, 
                "lastname" : lastname,
                "address" : address,
                "country" : country
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
	})
});