</div>
        
    </div>
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- javascript functions realted to cart -->
<script>
$(document).ready(function(){
    //button listener for Add to Cart
    $('.add-to-cart-form').on('submit', function(){
 
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        //sending these values to add_to_cart.php
        window.location.href = "add_to_cart.php?Pd_id=" + id + "&quantity=" + quantity;
        return false;
        });

    //button listener for Update Quantity
	$('.update-quantity-form').on('submit', function(){
 
    var id = $(this).find('.product-id').text();
    var quantity = $(this).find('.cart-quantity').val();
 
    // sending these values to update_quantity.php
    window.location.href = "update_quantity.php?Pd_id=" + id + "&quantity=" + quantity;
    return false;
	
    });

    // function to implement mouse hover
	$(document).on('mouseenter', '.product-img-thumb', function(){
    var data_img_id = $(this).attr('data-img-id');
    $('.product-img').hide();
    $('#product-img-'+data_img_id).show();
	});
});
</script>
 
</body>
</html>