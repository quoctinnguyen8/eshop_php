<?php include "_header.php"; ?>

<?php
$sql = "SELECT product.id, product_name, price, 
            discount_price, image, cate_name
            FROM product
            LEFT JOIN product_cate ON product.cate_id = product_cate.id
            ORDER BY id DESC";
$data = db_select($sql);
?>

<h2>Danh sách sản phẩm</h2>

<div class="card-list">

    <?php
    foreach ($data as $value) {
        $id = $value["id"];
        $name = $value["product_name"];
        $price = $value["price"];
        $discount_price = $value["discount_price"];
        $image = $value["image"];
        $cate_name = $value["cate_name"];
    ?>
        <div class="card">
            <div class="card-img">
                <img src="<?= upload($image) ?>" alt="">
            </div>
            <div class="card-info">
                <h3 title="<?= $name ?>"><?= $name ?></h3>
                <h4>
                    <?php
                    if (empty($discount_price) || $discount_price == 0) {
                        echo number_format($price);
                    } else {
                        echo "<s style='color:gray'>" . number_format($price) . "</s> ";
                        echo number_format($discount_price);
                    }
                    ?>
                </h4>
                <small><?= $cate_name ?></small>
                <a href="<?=route("tvgh", ["id" => $id]);?>" class="card-action">Thêm vào giỏ hàng</a>
            </div>
        </div>
    <?php } ?>
</div>
<?php include "_footer.php"; ?>