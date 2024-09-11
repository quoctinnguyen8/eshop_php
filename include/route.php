<?php

/*
 * Hệ thống đường dẫn trong trang web
 * Đường dẫn phải bắt đầu bằng dấu "/"
 * Cấu trúc:
 *      /đường-dẫn => [tên-đường-dẫn, tên-file]
 *  hoặc
 *      /đường-dẫn => tên-file
 *     
 * Trong đó:
 *      @string     /đường-dẫn:         URL mong muốn
 *      @string     tên-đường-dẫn:      tên không trùng dùng để điều hướng trong hệ thống
 *      @string     tên-file:           tên file sẽ load khi truy cập /đường-dẫn
 */

return [
    // "/"                     => ["trangchu", "web/index.php"],
    // "/lien-he"              => ["lienhe", "web/contact.php"],
    // "/contact"              => "web/contact.php"
    "/"                     => ["home", "index.php"],
    "/dang-nhap"            => ["dangnhap", "page/login.php"],
    "/dang-xuat"            => ["dangxuat", "page/logout.php"],
    "/quan-ly-danh-muc"     => ["qldm", "admin/product_cate-list.php"],
    "/them-danh-muc"        => ["tdm", "/admin/product_cate-add.php"],
    "/sua-danh-muc"         => ["sdm", "admin/product_cate-edit.php"],
    "/xoa-danh-muc"         => ["xdm", "admin/product_cate-del.php"],
    "/quan-ly-san-pham"     => ["qlsp", "admin/product-list.php"],
    "/them-san-pham"        => ["tsp", "admin/product-add.php"],
    "/sua-san-pham"         => ["ssp", "admin/product-edit.php"],
    "/xoa-san-pham"         => ["xsp", "admin/product-del.php"],
    "/them-tai-khoan"         => ["ttk", "admin/user-add.php"],
];
