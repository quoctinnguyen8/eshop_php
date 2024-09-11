<?php include "_header.php"; ?>

<?php

if (is_post_method()){
    $product_name = htmlspecialchars($_POST["product_name"] ?? "");
    $price = $_POST["price"] ?? "";
    $discount_price = $_POST["discount_price"] ?? "";
    $description = htmlspecialchars($_POST["description"] ?? "");
    $cate_id = $_POST["cate_id"] ?? "";
    // Upload và nhận tên file
    $filePath = upload_and_return_filename("image") ?? "";

    $sql = "INSERT INTO product(product_name, price, discount_price, description, cate_id, image) 
        VALUES (?, ?, ?, ?, ?, ?)";
    $params = [
        $product_name,
        $price,
        $discount_price,
        $description,
        $cate_id,
        $filePath
    ];
    db_execute($sql, $params);
    set_notify("Thêm sản phẩm thành công");
    redirect_to(route("qlsp"));
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Thêm sản phẩm</h1>
    <div class="control">
        <label>product_name</label>
        <input name="product_name" type="text" />
    </div>
    <div class="control">
        <label>price</label>
        <input name="price" type="number" />
    </div>
    <div class="control">
        <label>discount_price</label>
        <input name="discount_price" type="number" />
    </div>
    <div class="control">
        <label>description</label>
        <input name="description" type="text" />
    </div>

    <div class="control">
        <label>category</label>
        <select name="cate_id">
            <option value>Chọn 1 danh mục</option>
            <?php gen_option_ele("product_cate", "id", "cate_name");?>
        </select>
    </div>

    <div class="control">
        <label>image</label>
        <input name="image" type="file" />
    </div>

    <div class="control">
        <input type="submit" value="Thêm sản phẩm">
    </div>

</form>

<?php include "_footer.php"; ?>