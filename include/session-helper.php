
<?php

function get_id_from_cart()
{
    $carts = [];

    // Lấy id sản phẩm từ session
    foreach ($_SESSION as $key => $value){
        if (strpos($key, "cart_") == 0){
            $carts[] = explode("_", $key)[1];
        }
    }
    return $carts;
}
