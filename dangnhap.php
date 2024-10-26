<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu - Highlands Coffee</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css">
</head>
<body>
    <header>
        <img class="dinhdanganh" align="left" src="media/highlands-coffee-cream-logo.webp">
        <h1>Highlands Coffee</h1>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="trangchu.html">TRANG CHỦ</a></li>
            <li><a href="gioithieu.html">GIỚI THIỆU</a></li>
            <li>
                <a href="menu.html">MENU</a>
                <ul class="submenu">
                    <li><a href="menu.html">Cà Phê</a></li>
                    <li><a href="#chocolate">Trà Highlands</a></li>
                    <li><a href="#frappuccino">Freeze</a></li>
                    <li><a href="#tea">Food Menu</a></li>
                </ul>
            </li>
            <li><a href="nghenghiep.html">NGHỀ NGHIỆP</a></li>
            <li><a href="the.html">THẺ</a></li>
            <li><a href="dangnhap.php" class="login-button">ĐĂNG NHẬP</a></li>
        </ul>
    </nav>

    <div class="login-container">
        <h1 class="mau">Đăng Nhập</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Tên Đăng Nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Gửi</button>
            </div>
        </form>
        <p class="register-link">Chưa có tài khoản? <a href="register.html">Đăng ký ngay!</a></p> <!-- Thêm liên kết đăng ký -->
    </div>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'dangki');

    if ($conn->connect_error) {
        die('Kết nối thất bại: ' . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Đăng nhập thành công
            echo "<script>alert('Đăng nhập thành công!');</script>";
            // Điều hướng đến trang chính
            echo "<script>window.location.href='trangchu.html';</script>";
        } else {
            // Đăng nhập thất bại
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
