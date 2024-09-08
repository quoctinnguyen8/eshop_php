<?php include "_header.php"; ?>

<?php

$id = $_GET["id"] ?? 0;

if (is_post_method()){
    // Cập nhật dữ liệu
    $product_name = htmlspecialchars($_POST["product_name"] ?? "");
    $price = $_POST["price"] ?? "";
    $discount_price = $_POST["discount_price"] ?? "";
    $description = htmlspecialchars($_POST["description"] ?? "");
    $cate_id = $_POST["cate_id"] ?? "";
    // Upload và nhận tên file
    $filePath = upload_and_return_filename("image") ?? "";

    $sql = "UPDATE product
        SET product_name = ?,
            price = ?,
            discount_price = ?,
            description = ?,
            cate_id = ? 
        WHERE id = ?";
    $params = [
        $product_name,
        $price,
        $discount_price,
        $description,
        $cate_id,
        $id
    ];
    db_execute($sql, $params);


}else{
    // Lấy dữ liệu hiển thị lên form
    $sql = "SELECT * FROM product WHERE id=?";
    // Thực thi query để nhận kết quả
    $data = db_select($sql, [$id]);
    // Nếu không select được dữ liệu thì về trang danh sách
    if (count($data) == 0)
    {
        redirect_to("/admin/product-list.php");
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Sửa sản phẩm</h1>
    <div class="control">
        <label>product_name</label>
        <input name="product_name" type="text" value="<?=$data[0]["product_name"]?>" />
    </div>
    <div class="control">
        <label>price</label>
        <input name="price" type="number" value="<?=$data[0]["price"]?>" />
    </div>
    <div class="control">
        <label>discount_price</label>
        <input name="discount_price" type="number" value="<?=$data[0]["discount_price"]?>" />
    </div>
    <div class="control">
        <label>description</label>
        <input name="description" type="text" value="<?=$data[0]["description"]?>" />
    </div>

    <div class="control">
        <label>category</label>
        <select name="cate_id">
            <option value>Chọn 1 danh mục</option>
            <?php gen_option_ele("product_cate", "id", "cate_name", $data[0]["cate_id"] );?>
        </select>
    </div>

    <div class="control">
        <label>image</label>
        <?php 
        if (!empty($data[0]["image"])){
            echo "<img class='image' src='" . upload($data[0]["image"], true) . "' />";
        }
        ?>
        <input name="image" type="file" />
    </div>

    <div class="control">
        <input type="submit" value="Sửa sản phẩm">
    </div>

</form>

<?php include "_footer.php"; ?>