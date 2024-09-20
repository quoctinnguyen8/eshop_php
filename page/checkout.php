<?php
include "_header.php";
include __DIR__ . "/../include/session-helper.php";

if (is_post_method()){

    // Tính tổng bill
    $carts = get_id_from_cart();
    
    $sql = "SELECT id, product_name, price, discount_price 
            FROM product
            WHERE FIND_IN_SET(id, ?)";
    $data = db_select($sql, [join(",", $carts)]);
    $bill_total = 0;
    
    $bill_detail_data = [];
    foreach($data as $value){
        $id = $value["id"];
        $product_name = $value["product_name"];
        $price = $value["price"];
        $discount_price = $value["discount_price"];
        $final_price = 0;
        if (empty($discount_price) || $discount_price == 0){
            $final_price = $price;
        }else{
            $final_price = $discount_price;
        }
        $quantity = $_SESSION["cart_$id"];
        $total = $final_price * $quantity;
        $bill_total += $total;
        // Thêm mảng vào mảng
        // Do chưa có bill_id nên để tạm là 0
        $bill_detail_data[] = [0, $id, $product_name, $final_price, $quantity, $total];
    }
    
    $fullname = $_POST["fullname"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $addr = $_POST["addr"] ?? "";

    $sql = "insert into bills(fullname, phone, addr, total, create_date)
            values(?, ?, ?, ?, now()) ";
    db_execute($sql, [$fullname, $phone, $addr, $bill_total], $bill_id);

    // Thêm dữ liệu cho bill_details
    $bill_detail_sql = "insert into bill_details(
                    bill_id, 
                    product_id,
                    product_name,
                    price,
                    quantity,
                    total
                )values(?, ?, ?, ?, ?, ?)";
    foreach ($bill_detail_data as $value) {
        // Đặt lại giá trị cho bill_id
        $value[0] = $bill_id;
        db_execute($bill_detail_sql, $value);
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION["cart_$value[1]"]);
    }

    redirect_to(route("home"));
}

?>


<!-- Giao diện nhập thông tin (bảng bills)
    tên người mua 
    sđt
    địa chỉ nhận hàng -->

<form method="post" class="form">
    <h2>Thông tin đặt hàng</h2>
    <div class="control">
        <label>Tên người đặt hàng</label>
        <input type="text" name="fullname" required />
    </div>

    <div class="control">
        <label>Số điện thoại</label>
        <input type="tel" name="phone" required />
    </div>

    <div class="control">
        <label>Địa chỉ nhận hàng</label>
        <textarea name="addr" required></textarea>
    </div>

    <div class="control">
        <input type="submit" value="Đặt hàng!" />
    </div>
</form>

<?php include "_footer.php"; ?>