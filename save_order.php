<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "highlands_card");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$card_design = $_POST['card_design'];
$card_value = $_POST['card_value'];
$sender_name = $_POST['sender_name'];
$sender_email = $_POST['sender_email'];
$sender_phone = $_POST['sender_phone'];
$receiver_name = $_POST['receiver_name'];
$receiver_email = $_POST['receiver_email'];
$receiver_phone = $_POST['receiver_phone'];
$message = $_POST['message'];

// Chèn dữ liệu vào bảng orders
$sql = "INSERT INTO orders (card_design, card_value, sender_name, sender_email, sender_phone, receiver_name, receiver_email, receiver_phone, message) 
        VALUES ('$card_design', $card_value, '$sender_name', '$sender_email', '$sender_phone', '$receiver_name', '$receiver_email', '$receiver_phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Đơn hàng đã được lưu thành công!'); window.location.href = 'the.html';</script>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
