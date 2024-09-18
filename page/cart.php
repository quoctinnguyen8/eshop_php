<?php
include "_header.php";
include __DIR__ . "/../include/session-helper.php";

// explode("_", "cart_10") => ["cart", "10"]

$carts = get_id_from_cart();

$sql = "SELECT product.id, product_name, price, 
        discount_price, image, cate_name
        FROM product
        LEFT JOIN product_cate ON product.cate_id = product_cate.id
        WHERE FIND_IN_SET(product.id, ?)
        ORDER BY id DESC";

// chuyển mảng thành chuỗi, phân tách mỗi phần từ bằng dấu phẩy
$id = join(",", $carts);

$data = db_select($sql, [$id]);

?>

<table>
    <!-- đặt độ rộng cho từng cột -->
    <colgroup>
        <col style="width: 5%;"/>
        <col style="width: 30%;"/>
        <col style="width: 10%;"/>
        <col style="width: 10%;"/>
        <col style="width: 15%;"/>
        <col style="width: 10%;"/>
        <col style="width: 10%;"/>
        <col style="width: 10%;"/>
    </colgroup>
    <thead>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Danh mục</th>
        <th>SL</th>
        <th>Thành tiền</th>
        <th></th>
    </thead>
    <tbody>
        <?php
        $bill_total = 0;
        foreach ($data as $value){
            $id = $value["id"];
            $name = $value["product_name"];
            $price = $value["price"];
            $discount_price = $value["discount_price"];
            $image = $value["image"];
            $cate_name = $value["cate_name"];

            $final_price = 0;
            if (empty($discount_price) || $discount_price == 0){
                $final_price = $price;
            }else{
                $final_price = $discount_price;
            }
            $quantity = $_SESSION["cart_$id"];
            $total = $final_price * $quantity;

            $bill_total += $total;
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= number_format($final_price) ?></td>
                <td>
                    <img src="<?= upload($image) ?>" alt="" width="70">
                </td>
                <td><?= $cate_name ?></td>
                <td><?= $quantity ?></td>
                <td><?= number_format($total) ?></td>
                <td>
                    <a href="<?=route("xgh", ["id" => $id])?>"
                        onclick="return confirm('Xác nhận xóa sản phẩm này khỏi giỏ hàng?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="8">
                <p style="display: flex; justify-content: space-between;">
                    Tổng giá trị đơn hàng: <?=number_format($bill_total)?>
                    <a href="<?=route("dh"); ?>">Đặt hàng ngay!</a>
                </p>
            </td>
        </tr>
    </tbody>
</table>

<?php
include "_footer.php";