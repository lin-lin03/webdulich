<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Dulich.VN
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .nav>li {
      float: left;
      margin-right: 15px;
    }

    .nav>li>a {
      text-transform: uppercase;
      color: red;
    }

    .nav li {
      position: relative;
      list-style: none;
    }

    .nav li a {
      padding: 10px;
      line-height: 20px;
      display: inline-block;
    }

    .nav .sub-menu {
      display: none;
      position: absolute;
      top: 0;
      left: 100%;
      width: 200px;
      background-color: #eee;
      padding: 5px 20px;
      z-index: 5;
    }

    .nav li:hover>.sub-menu {
      display: block;
    }

    .nav>li>.sub-menu {
      top: 40px;
      left: 0;
    }


    input{
      padding: 5px 7px;
      margin-top: 5px;
      border-radius: 5px;

    }
    button{
      padding: 5px 7px;
      color: white;
      background-color: #d9534f;
      border-radius: 5px;
      border-color: #d9534f;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="header">
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Dulich.VN</a>
        </div>

        <ul class="nav navbar-nav">
          <li><a href="./user.php">Trang chủ</a></li>
          <li>
            <a href="#">Tour trong nước</a>
            <ul class="sub-menu">
              <li>
                <a href="#">Miền Bắc</a>
                <ul class="sub-menu">
                  <li><a href="#">Hà Nội</a></li>
                  <li><a href="#">Sapa</a></li>
                  <li><a href="#">Lạng Sơn</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Miền Trung</a>
                <ul class="sub-menu">
                  <li><a href="#">Đà Nắng</a></li>
                  <li><a href="#">Huế</a></li>
                  <li><a href="#">Quảng Nam</a></li>
                  <li><a href="#">Quy Nhơn</a></li>
                  <li><a href="#">Phú Yên</a></li>
                  <li><a href="#">Nha Trang</a></li>
                  <li><a href="#">Phan Thiết</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Miền Nam</a>
                <ul class="sub-menu">
                  <li><a href="#">Vũng Tàu</a></li>
                  <li><a href="#">Long An</a></li>
                  <li><a href="#">Cần Thơ</a></li>
                  <li><a href="#">Hồ Chí Minh</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Tour ngoài nước</a>
            <ul class="sub-menu">
              <li>
                <a href="#">Châu Âu</a>
                <ul class="sub-menu">
                  <li><a href="#">Thụy Sỹ</a></li>
                  <li><a href="#">Phần Lan</a></li>
                  <li><a href="#">Pháp</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Châu Á</a>
                <ul class="sub-menu">
                  <li><a href="#">Thượng Hải</a></li>
                  <li><a href="#">Hồng Kông</a></li>
                  <li><a href="#">Nhật Bản</a></li>
                  <li><a href="#">Singapore</a></li>
                  <li><a href="#">Úc</a></li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="./khachdl.php">Danh sách khách</a>
          </li>
          <li>
            <a href="./dangnhap.php">Đăng xuất</a>
          </li>
          
        </ul>

        <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        $searchS = $_POST['search'] ?? ''; // Sử dụng khóa đúng và đảm bảo biến không gây lỗi nếu không tồn tại.
        ?>
        <div class="container" align="right">
          <div class="searchform cf">
            <form action="search.php" method="get">
              <input type="text" placeholder="Nhập tên thành phố bạn muốn tới?" name="search"
                value="<?php echo htmlspecialchars($searchS); ?>">
              <button type="submit" name="ok">Tìm kiếm</button>
            </form>
          </div>

          <?php
          if (isset($_GET['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);

            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
              echo "Yêu cầu nhập dữ liệu vào ô trống.";
            } else {
              // Dùng câu lệnh LIKE trong SQL và sử dụng toán tử % để tìm kiếm dữ liệu chính xác hơn.
              $query = "SELECT * FROM tours WHERE NAME LIKE '%$search%'";

              // Kết nối SQL
              $conn = mysqli_connect("localhost", "root", "", "webdulich");

              if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
              }

              // Thực thi câu truy vấn
              $sql = mysqli_query($conn, $query);

              // Đếm số dòng trả về trong SQL.
              $num = mysqli_num_rows($sql);

              // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
              if ($num > 0 && $search != "") {
                // Dùng $num để đếm số dòng trả về.
                echo "$num kết quả trả về với từ khóa <b>$search</b>";

                // Vòng lặp while & mysqli_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                while ($row = mysqli_fetch_assoc($sql)) {
                  echo '<tr>';
                  echo "<td>{$row['ID']}</td>";
                  echo "<td>{$row['NAME']}</td>";
                  echo "<td>{$row['KIND_TOUR']}</td>";
                  echo '</tr>';
                }
                echo '</table>';
              } else {
                echo "Không tìm thấy kết quả!";
              }

              // Đóng kết nối
              mysqli_close($conn);
            }
          }
          ?>
        </div>

      </nav>
    </div><!-- Close Header -->