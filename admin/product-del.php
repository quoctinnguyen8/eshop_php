<?php

$id = $_GET["id"] ?? "";

// Nếu giá trị $id không empty
if (empty($id) == false){

    // Lấy tên file để xóa
    $sql = "SELECT image FROM product where id = ?";
    $image = db_select($sql, [$id])[0]["image"] ?? "";

    // Xóa dữ liệu trong DB
    $sql = "DELETE FROM product WHERE id = ?";
    $ket_qua = db_execute($sql, [$id]);

    if ($ket_qua == true){
        // Nếu xóa thành công thì xóa file
        if (empty($image) == false){
            remove_file($image);
        }
        set_notify("Xóa sản phẩm thành công");
    }
}
js_redirect_to(route("qlsp"));