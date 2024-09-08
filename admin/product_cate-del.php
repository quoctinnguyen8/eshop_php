<?php
include "../include/common.php"; 

$id = $_GET["id"] ?? "";

// Nếu giá trị $id không empty
if (empty($id) == false){

    $sql = "SELECT COUNT(*) as CNT FROM product WHERE cate_id=?";
    $count = db_select($sql, [$id])[0]["CNT"];
    if ($count != 0){
        js_alert("Có $count sản phẩm thuộc danh mục này, không thể xóa!");
        js_redirect_to("/admin/product_cate-list.php");
    }

    // Tiến hành xóa dựa theo id
    $sql = "delete from product_cate where id = ?";
    $ket_qua = db_execute($sql, [$id]);
    // Thông báo xóa thành công
    if ($ket_qua == true){
        js_alert("Xóa thành công!");
    }
    // Quay về trang danh sách danh mục
    js_redirect_to("/admin/product_cate-list.php");
}

