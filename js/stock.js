$(document).ready(function(e){
	$("#add-stock").click(function() {
		let product = $("#product-input").val();
        let price = $("#price-input").val();
        let quantity = $("#quantity-input").val();
        
        $.ajax({
            type: 'POST',
            url: '../controller/stock_controller.php', 
            data : { 
                "product" : product, 
                "price" : price,
                "quantity" : quantity
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