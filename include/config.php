<?php

/*
 * Thay "eshop" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "/eshop");

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/eshop/asset");

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/eshop/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
	"host" => "localhost",
	"db" => "eshop_php",
	"username" => "root",
	"password" => "",
];

// Hệ thống router trong trang web
$web_routes = require "route.php";