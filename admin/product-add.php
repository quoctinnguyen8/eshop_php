<?php include "_header.php"; ?>


<?php

if (is_post_method()){
    $product_name = $_POST["product_name"] ?? "";
    $price = $_POST["price"] ?? "";
    $discount_price = $_POST["discount_price"] ?? "";
    $description = $_POST["description"] ?? "";

    $sql = "INSERT INTO product(product_name, price, discount_price, description) 
        VALUES (?, ?, ?, ?)";
    $params = [
        $product_name,
        $price,
        $discount_price,
        $description
    ];
    db_execute($sql, $params);
}
?>


<form action="" method="post">
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
        <input type="submit" value="Thêm sản phẩm">
    </div>

</form>

<?php include "_footer.php"; ?>