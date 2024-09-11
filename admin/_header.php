<?php include "../include/common.php";

// Chuyển về trang đăng nhập nếu chưa đăng nhập
if (isset($_SESSION["username"]) == false){
    js_alert("Bạn cần đăng nhập để truy cập chức năng này!");
    js_redirect_to("/page/login.php", true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý shop</title>
    <link rel="stylesheet" href="<?php asset("css/admin.css");?>">
    <link rel="stylesheet" href="<?php asset("css/notify.css");?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="/eshop/admin/product_cate-list.php">Danh sách danh mục</a></li>
        <li><a href="/eshop/admin/product-list.php">Danh sách sản phẩm</a></li>
        <li><a href="/eshop/admin/user-add.php">Thêm tài khoản</a></li>
        <li><a href="/eshop/page/logout.php" 
            onclick="return confirm('Xác nhận đăng xuất?')">Đăng xuất</a></li>
    </ul>
</nav>
