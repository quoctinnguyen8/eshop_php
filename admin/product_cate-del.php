<?php

$id = $_GET["id"] ?? "";

// Nếu giá trị $id không empty
if (empty($id) == false){

    $sql = "SELECT COUNT(*) as CNT FROM product WHERE cate_id=?";
    $count = db_select($sql, [$id])[0]["CNT"];
    if ($count != 0){
        set_notify("Có $count sản phẩm thuộc danh mục này, không thể xóa!");
        redirect_to(route("qldm"));
    }

    // Tiến hành xóa dựa theo id
    $sql = "delete from product_cate where id = ?";
    $ket_qua = db_execute($sql, [$id]);
    // Thông báo xóa thành công
    if ($ket_qua == true){
        set_notify("Xóa danh mục thành công!");
    }
    // Quay về trang danh sách danh mục
    redirect_to(route("qldm"));
}

