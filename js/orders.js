$(document).ready(function(e){
	$("#add-order").click(function() {
		let numOrder = $("#order-input").val();
        let price = $("#price-input").val();
        let idcustomer = $("#customer-input").val();
        
        $.ajax({
            type: 'POST',
            url: '../controller/order_controller.php', 
            data : { 
                "numOrder" : numOrder, 
                "price" : price,
                "idcustomer" : idcustomer
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