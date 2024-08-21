<?php include "../include/common.php";
session_start();

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
</head>
<body>