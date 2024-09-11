<?php include "_header.php"; 

if (is_post_method()){
    // Nhận dữ liệu từ form, method="post"
    $name = htmlspecialchars($_POST["cate_name"] ?? "");

    // Nếu biến $name có dữ liệu
    if (empty($name) == false){
        // câu query sử dụng parameter (ký tự "?")
        $sql = "insert into product_cate(cate_name) values(?)";
        // mảng dữ liệu dùng cho param tương ứng từng vị trí
        $data = [$name];
        $ket_qua = db_execute($sql, $data);

        // Nếu thực thi thành công (kết quả => true)
        if ($ket_qua == true){
            set_notify("Thêm danh mục thành công!");
            // quay về trang danh sách khi thêm thành công
            js_redirect_to(route("qldm"));
        }
    }
}

?>


<form method="post">
    <h2>Thêm danh mục sản phẩm</h2>

    <div class="control">
        <label>Tên danh mục</label>
        <input type="text" name="cate_name" required />
    </div>

    <div class="control">
        <input type="submit" value="Thêm danh mục" />
    </div>
</form>


<?php include "_footer.php"; ?>