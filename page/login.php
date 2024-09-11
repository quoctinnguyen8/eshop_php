<?php

if (is_post_method()){
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // có nhập username
    if (empty($username) == false){
        $sql = "select * from user where username=?";
        $user = db_select($sql, [$username]);
        if (count($user) == 0){
            js_alert("Sai tên đăng nhập hoặc mật khẩu!");
            js_redirect_to(route("dangnhap"));
        }
        // nếu tồn tại username thì so sánh mật khẩu
        $user = $user[0];
        // nếu mật khẩu người dùng nhập vào đúng => đăng nhập thành công
        if (password_verify($password, $user["pwd"]) == true){
            // Lưu thông tin username vào session
            $_SESSION["username"] = $username;
            js_alert("Đăng nhập thành công!");
            js_redirect_to(route("qlsp"));
        }else{
            js_alert("Sai tên đăng nhập hoặc mật khẩu!");
            js_redirect_to(route("dangnhap"));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <form method="post">
        <h1>Đăng nhập</h1>
        <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Mật khẩu</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Đăng nhập">
        </div>
    </form>
</body>

</html>