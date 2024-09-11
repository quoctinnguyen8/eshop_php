<?php
$notify_mesg = $_SESSION["ESHOP_MESG"] ?? "";

if (!empty($notify_mesg)) 
{
?>
<div class="notify-container">
    <div class="notify">
        <div class="notify-header">
            <b>Thông báo</b>
            <label>&times;
                <input type="checkbox" />
            </label>
        </div>
        <div class="notify-body">
            <?=$notify_mesg ?>
        </div>
    </div>
</div>
<?php 
    // Xóa nội dung thông báo sau khi đã hiển thị
    $_SESSION["ESHOP_MESG"] = "";
    // unset($_SESSION["ESHOP_MESG"]);
} ?>