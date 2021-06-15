<?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}
 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
 
    //layout for individual product
    echo "<div class='col-md-4 m-b-20px'>";
 
        echo "<div class='product-id display-none'>{$Pd_id}</div>";
 
        echo "<a href='product.php?Pd_id={$Pd_id}' class='product-link'>";
            // fetching product first image 
            $product_image->product_id=$Pd_id;
            $stmt_product_image=$product_image->readFirst();
 
            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='m-b-10px'>";
                    echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                echo "</div>";
            }
 
            // name of the product
            echo "<div class='product-name m-b-10px'>{$pd_name}</div>";
            //cost of the product
            echo "<div class='product-price m-b-10px'>"."&#36;"."{$cost}</div>";
        echo "</a>";

        // add to cart button
        echo "<div class='m-b-10px'>";
            if(array_key_exists($id, $_SESSION['cart'])){
                echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                    echo "Update Cart";
                echo "</a>";
            }else{
                echo "<a href='add_to_cart.php?Pd_id={$Pd_id}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
            }
        echo "</div>";
 
    echo "</div>";
}
 
include_once "paging.php";
?>