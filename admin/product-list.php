<?php include "_header.php";

$sql = "SELECT product.id, product_name, price, 
            discount_price, image, cate_name
        FROM product
        LEFT JOIN product_cate ON product.cate_id = product_cate.id
        ORDER BY id DESC";
$data = db_select($sql);

?>

<table>
    <!-- đặt độ rộng cho từng cột -->
    <colgroup>
        <col style="width: 5%;"/>
        <col style="width: 50%;"/>
        <col style="width: 10%;"/>
        <col style="width: 10%;"/>
        <col style="width: 15%;"/>
        <col style="width: 10%;"/>
    </colgroup>
    <thead>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Danh mục</th>
        <th><a href="<?=route("tsp")?>">Thêm sản phẩm</a></th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $value){
            $id = $value["id"];
            $name = $value["product_name"];
            $price = $value["price"];
            $discount_price = $value["discount_price"];
            $image = $value["image"];
            $cate_name = $value["cate_name"];
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td>
                    <?php
                    if (empty($discount_price) || $discount_price == 0){
                        echo number_format($price);
                    }else{
                        echo "<s>" . number_format($price) . "</s>";
                        echo "<br>";
                        echo number_format($discount_price);
                    }
                    ?>
                </td>
                <td>
                    <img src="<?= upload($image) ?>" alt="" width="70">
                </td>
                <td><?= $cate_name ?></td>
                <td>
                    <a href="<?=route("ssp", ["id" => $id]) ?>">Sửa</a>
                    <a href="<?=route("xsp", ["id" => $id]) ?>"
                        onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "_footer.php"; ?>