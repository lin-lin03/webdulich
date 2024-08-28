<?php
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
$conn = mysqli_connect('localhost', 'root', '', 'webdulich');
mysqli_set_charset($conn, 'UTF8');
// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($conn, "select count(ID) as total from thongtinchitiettour");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;

// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// echo $total_page;

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
       $current_page = $total_page;
} else if ($current_page < 1) {
       $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$resultCountry = mysqli_query($conn, "SELECT * FROM thongtinchitiettour LIMIT $start, $limit");


?>