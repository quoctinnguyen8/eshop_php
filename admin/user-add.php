<?php include "_header.php"; 

if (is_post_method()){
    // Nhận dữ liệu từ form, method="post"
    $username = $_POST["username"] ?? "";
    $pwd = $_POST["pwd"] ?? "";

    // câu query sử dụng parameter (ký tự "?")
    $sql = "insert into user(username, pwd) values(?, ?)";
    // hash mật khẩu
    $pwd = password_hash($pwd, null);
    // mảng dữ liệu dùng cho param tương ứng từng vị trí
    $data = [$username, $pwd];
    $ket_qua = db_execute($sql, $data);

    // Nếu thực thi thành công (kết quả => true)
    if ($ket_qua == true){
        js_alert("Thêm tài khoản thành công!");
    }
}

?>


<form method="post">
    <h2>Thêm tài khoản</h2>

    <div class="control">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" required />
    </div>

    <div class="control">
        <label>Mật khẩu</label>
        <input type="password" name="pwd" required />
    </div>

    <div class="control">
        <input type="submit" value="Thêm tài khoản" />
    </div>
</form>


<?php include "_footer.php"; ?>