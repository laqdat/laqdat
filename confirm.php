<?php
// Kiểm tra xem dữ liệu đã được gửi từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $card_design = htmlspecialchars($_POST['card_design']);
    $card_value = htmlspecialchars($_POST['card_value']);
    $sender_name = htmlspecialchars($_POST['sender_name']);
    $sender_email = htmlspecialchars($_POST['sender_email']);
    $sender_phone = htmlspecialchars($_POST['sender_phone']);
    $receiver_name = htmlspecialchars($_POST['receiver_name']);
    $receiver_email = htmlspecialchars($_POST['receiver_email']);
    $receiver_phone = htmlspecialchars($_POST['receiver_phone']);
    $message = htmlspecialchars($_POST['message']);
} else {
    // Nếu truy cập trực tiếp vào trang này mà không qua form, chuyển hướng về trang chính
    header("Location: the.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <link rel="stylesheet" type="text/css" href="css/confirm.css">
</head>
<body>
    <div class="confirmation-container">
        <h2>Xác Nhận Đơn Hàng</h2>
        <div class="confirmation-details">
            <p><strong>Mẫu thẻ:</strong> <?php echo $card_design; ?></p>
            <p><strong>Giá trị thẻ:</strong> <?php echo number_format($card_value, 0, ',', '.') . " VND"; ?></p>
            <p><strong>Tên người gửi:</strong> <?php echo $sender_name; ?></p>
            <p><strong>Email người gửi:</strong> <?php echo $sender_email; ?></p>
            <p><strong>Số điện thoại người gửi:</strong> <?php echo $sender_phone; ?></p>
            <p><strong>Tên người nhận:</strong> <?php echo $receiver_name; ?></p>
            <p><strong>Email người nhận:</strong> <?php echo $receiver_email ? $receiver_email : 'Không có'; ?></p>
            <p><strong>Số điện thoại người nhận:</strong> <?php echo $receiver_phone; ?></p>
            <p><strong>Lời nhắn:</strong> <?php echo $message ? $message : 'Không có'; ?></p>
        </div>

        <div class="button-group">
            <!-- Nút chỉnh sửa quay lại trang form với dữ liệu cũ -->
            <form action="the.html" method="get" style="display: inline;">
                <button type="submit">Chỉnh Sửa</button>
            </form>

            <!-- Nút xác nhận đơn hàng và lưu vào cơ sở dữ liệu -->
            <form action="save_order.php" method="post" style="display: inline;">
                <input type="hidden" name="card_design" value="<?php echo $card_design; ?>">
                <input type="hidden" name="card_value" value="<?php echo $card_value; ?>">
                <input type="hidden" name="sender_name" value="<?php echo $sender_name; ?>">
                <input type="hidden" name="sender_email" value="<?php echo $sender_email; ?>">
                <input type="hidden" name="sender_phone" value="<?php echo $sender_phone; ?>">
                <input type="hidden" name="receiver_name" value="<?php echo $receiver_name; ?>">
                <input type="hidden" name="receiver_email" value="<?php echo $receiver_email; ?>">
                <input type="hidden" name="receiver_phone" value="<?php echo $receiver_phone; ?>">
                <input type="hidden" name="message" value="<?php echo $message; ?>">
                <button type="submit">Xác Nhận Đơn Hàng</button>
            </form>
        </div>
    </div>
</body>
</html>
