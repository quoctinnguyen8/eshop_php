<?php 
include "_header.php";

$sql = "SELECT id, cate_name FROM product_cate";
$data = db_select($sql);

?>

<table>
    <!-- đặt độ rộng cho từng cột -->
    <colgroup>
        <col style="width: 5%;"/>
        <col style="width: 85%;"/>
        <col style="width: 10%;"/>
    </colgroup>
    <thead>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th><a href="<?=route("tdm")?>">Thêm danh mục</a></th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $value){
            $id = $value["id"];
            $name = $value["cate_name"];
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td>
                    <a href="<?=route("sdm", ["id" => $id]) ?>">Sửa</a>
                    <a href="<?=route("xdm", ["id" => $id]) ?>"
                        onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "_footer.php"; ?>