<?php
include "../include/common.php"; 

$id = $_GET["id"] ?? "";

// Nếu giá trị $id không empty
if (empty($id) == false){
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

