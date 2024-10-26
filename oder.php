<?php
$servername = "localhost"; // Thay đổi nếu cần thiết
$username = "username"; // Thay đổi với tên người dùng của bạn
$password = "password"; // Thay đổi với mật khẩu của bạn
$dbname = "card_orders"; // Tên cơ sở dữ liệu bạn đã tạo

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ yêu cầu POST
$senderName = $_POST['senderName'];
$senderEmail = $_POST['senderEmail'];
$senderPhone = $_POST['senderPhone'];
$recipientName = $_POST['recipientName'];
$recipientEmail = $_POST['recipientEmail'];
$recipientPhone = $_POST['recipientPhone'];
$message = $_POST['message'];

// Thực hiện truy vấn để lưu đơn hàng
$sql = "INSERT INTO orders (sender_name, sender_email, sender_phone, recipient_name, recipient_email, recipient_phone, message) VALUES ('$senderName', '$senderEmail', '$senderPhone', '$recipientName', '$recipientEmail', '$recipientPhone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Đặt hàng thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
