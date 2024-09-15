<?php

$id = $_GET["id"] ?? 0;
// [
//     "id-san-pham-1" => 1,
//     "id-san-pham-2" => 2,
// ]

if ($id == 0){
    redirect_to(route("home"));
}

// Mỗi lần thêm là 1 sản phẩm
if (isset($_SESSION["cart_$id"])){
    $_SESSION["cart_$id"] += 1;
}else{
    $_SESSION["cart_$id"] = 1;
}

redirect_to(route("home"));