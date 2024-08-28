<html>

<head>
    <style>
        body {
            color: #fff;
            font: 87.5%/1.5em 'Open Sans', sans-serif;
            background: url(images/vn.jpg)no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }



        .form-wrapper {
            width: 300px;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 48%;
            margin: -184px 0px 0px -155px;
            background: rgba(0, 0, 0, 0.27);
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.6), inset 0px 1px 0px rgba(255, 255, 255, 0.04);
        }

        .form-item {
            width: 100%;
        }


        h3 {
            font-size: 25px;
            font-weight: 640;
            margin-bottom: 10px;
            color: #e7e7e7;
            padding: 6px;
            font-family: 'sans-serif', 'helvetica';
        }



        .form-item input {
            border: none;
            background: transparent;
            color: #fff;
            margin-top: 11px;
            font-family: 'Open Sans', sans-serif;
            font-size: 1.2em;
            height: 49px;
            padding: 0 16px;
            width: 100%;
            padding-left: 55px;

        }

        input[type='password'] {
            background: transparent url("images/pass.jpg") no-repeat;
            background-position: 10px 50%;
        }

        input[type='text'] {
            background: transparent url("images/user.jpg") no-repeat;
            background-position: 10px 50%;

        }

        .form-item input:focus {
            outline: none;
            border: 1.4px solid #cfecf0;
        }

        .button-panel {
            margin-bottom: 20px;
            padding-top: 10px;
            width: 100%;
        }

        .button-panel .button {
            background: #00b6df;
            border: none;
            color: #fff;
            cursor: pointer;
            height: 50px;
            font-family: 'helvetica', 'Open Sans', sans-serif;
            font-size: 1.2em;
            text-align: center;
            text-transform: uppercase;
            transition: background 0.6s linear;
            width: 100%;
            margin-top: 10px;
        }

        .button:hover {
            background: #6eb7cb;
        }

        .form-item input,
        .button-panel .button {
            border-radius: 2px
        }

        .reminder {
            text-align: center;
        }

        .reminder a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .reminder a:hover {
            color: #cab6bf;
        }
    </style>
</head>

<body>
    <div class="form-wrapper">

        <form action="dangnhap.php" method="post">
            <h3>Đăng Nhập</h3>


            <div class="form-item">
                <input type="text" name="txtUsername" required="required" placeholder="username" autofocus
                    required></input>
            </div>

            <div class="form-item">
                <input type="password" name="txtPassword" required="required" placeholder="password" required></input>
            </div>


            <div class="button-panel">
                <input type="submit" class="button" title="dangnhap" name="dangnhap" value="Đăng Nhập"></input>
            </div>
        </form>


        <?php
        //Khai báo sử dụng session
        session_start();

        //Khai báo utf-8 để hiển thị được tiếng việt
        header('Content-Type: text/html; charset=UTF-8');

        //Xử lý đăng nhập
        if (isset($_POST['dangnhap'])) {

            $connect = mysqli_connect("localhost", "root", "", "webdulich");

            // ktra connect
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }


            //Lấy dữ liệu nhập vào tu input
            $username = addslashes($_POST['txtUsername']);
            $password = addslashes($_POST['txtPassword']);

            //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
            if (!$username || !$password) {
                echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
                exit;
            }

            //Kiểm tra tên đăng nhập có tồn tại không
            $query = mysqli_query($connect, "SELECT ID, PASSWORD,POSITION FROM user WHERE ID='$username' and PASSWORD='$password'");
            if (mysqli_num_rows($query) == 0) {
                echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
                exit;
            }

            //Lấy mật khẩu trong database ra
            $row = mysqli_fetch_array($query);

            //So sánh 2 mật khẩu có trùng khớp hay không
            if ($password != $row['PASSWORD']) {
                echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
                exit;
            }

            //Lưu tên đăng nhập
            $_SESSION['username'] = $username;
            $_SESSION['position'] = $row['POSITION'];

            // Chuyển hướng dựa trên quyền hạn
            if ($row['POSITION'] == 'admin') {
                header("Location: admin/admin.php");
            } else {
                header("Location: user.php");
            }
            exit();
        }
        ?>
        <div class="reminder">
            <p>Chưa có tài khoản? <a href="dangky.php">Đăng Ký</a></p>
            <p><a href="index.php">Quay lại</a></p>
        </div>

    </div>

</body>

</html>