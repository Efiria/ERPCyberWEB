$(document).ready(function(e){
	$("#add-order").click(function() {
		let numOrder = $("#order-input").val();
        let price = $("#price-input").val();
        let idcustomer = $("#customer-input").val();

        let order = {};
        $(".quantity").each(function(){
            if ($(this).val() != 0) {
                order[$(this).attr("pid")] = $(this).val()
            }
        });

        if (!numOrder) {
            alert('Please add a number for the order')
            return
        }else {
            
            if (Object.keys(order).length === 0) {
                alert('Please add some product to the order')
                return
            } else {

                $.ajax({
                    type: 'POST',
                    url: '../controller/order_controller.php', 
                    data : { 
                        "numOrder" : numOrder, 
                        "price" : price,
                        "idcustomer" : idcustomer,
                        "order" : order
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
        }
    })
    
    $( ".quantity" ).change(function() {
        if($(this).val() == null){
            $(this).val(0)
        }
        
        let total = "#" + $(this).attr('product') + "-total";
        let price = "#" + $(this).attr('product') + "-price";
        $(total).val($(this).val() * $(price).val())

        let totaldisplay = 0;
        $(".total").each(function(){
            totaldisplay = totaldisplay + parseInt($(this).val())
        });

        $("#price-input").val(totaldisplay)
    });

    $(".show-details").click(function() {

        if ($("."+$(this).attr('pid')+"-details").attr('display') == 'hidden') {
            $(this).text('-')
            $("."+$(this).attr('pid')+"-details").attr('display','pashidden')
            $("."+$(this).attr('pid')+"-details").css('display','table-row')

        }else{
            $(this).text('+')
            $("."+$(this).attr('pid')+"-details").attr('display','hidden')
            $("."+$(this).attr('pid')+"-details").css('display','none')
        }
    })
});