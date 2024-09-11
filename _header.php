
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EShop</title>
    <link rel="stylesheet" href="<?= asset("css/site.css");?>">
</head>
<body>
    <div class="container">
    <header>
        <div class="logo">Logo</div>
        <div class="search-bar">
            <form action="">
                <input type="text" placeholder="Tìm kiếm...">
            </form>
        </div>
        <div class="menu">
            <a href="#">Giỏ hàng</a>
            <?php if (isset($_SESSION["username"]) == false){ ?>
                <a href="<?=route("dangnhap")?>">Đăng nhập</a>
            <?php } else { ?>
                <a href="<?=route("qlsp")?>">Quản lý</a>
                <a href="<?=route("dangxuat")?>" 
                    onclick="return confirm('Xác nhận đăng xuất?')">Đăng xuất</a>
            <?php } ?>
        </div>
    </header>
        <section class="main">
            <aside>
                <nav>
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <!-- Danh sách danh mục sản phẩm -->
                    </ul>
                </nav>
            </aside>
            <main>  