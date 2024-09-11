<?php include "_header.php"; 

$id = $_GET["id"] ?? 0;

if (is_post_method()){
    // Nhận dữ liệu từ form, method="post"
    $name = htmlspecialchars($_POST["cate_name"] ?? "");

    // Nếu biến $name có dữ liệu
    if (empty($name) == false){
        // câu query sử dụng parameter (ký tự "?")
        $sql = "UPDATE product_cate SET cate_name=? 
                WHERE id=? ";
        // mảng dữ liệu dùng cho param tương ứng từng vị trí
        $param = [$name, $id];
        $ket_qua = db_execute($sql, $param);

        // Nếu thực thi thành công (kết quả => true)
        if ($ket_qua == true){
            set_notify("Sửa danh mục thành công!");
            // quay về trang danh sách khi sửa thành công
            js_redirect_to(route("qldm"));
        }
    }
}else{
    // Viết câu query để select dữ liệu của bảng product_cate theo id
    $sql = "SELECT * FROM product_cate WHERE id=?";
    // Thực thi query để nhận kết quả
    $data = db_select($sql, [$id]);
    // Nếu không select được dữ liệu thì về trang danh sách
    if (count($data) == 0)
    {
        redirect_to(route("qldm"));
    }
}

?>


<form method="post">
    <h2>Sửa danh mục sản phẩm</h2>

    <div class="control">
        <label>Tên danh mục</label>
        <input type="text" name="cate_name" value="<?= $data[0]["cate_name"] ?>" required />
    </div>

    <div class="control">
        <input type="submit" value="Sửa danh mục" />
    </div>
</form>


<?php include "_footer.php"; ?>