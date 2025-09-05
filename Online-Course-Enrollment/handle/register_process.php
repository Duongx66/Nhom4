<?php
require_once __DIR__ . "/../functions/db_connection.php";

$conn = getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username   = trim($_POST['username'] ?? '');
    $password   = trim($_POST['password'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $full_name  = trim($_POST['full_name'] ?? '');
    $role       = trim($_POST['role'] ?? 'student');

    // Bỏ mã hóa mật khẩu, lưu trực tiếp
    $plainPassword = $password;

    // Kiểm tra email hoặc username đã tồn tại chưa
    $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "Tên đăng nhập hoặc email đã tồn tại!";
    } else {
        // Thêm người dùng mới
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, full_name, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $plainPassword, $email, $full_name, $role);

        if ($stmt->execute()) {
            echo "Đăng ký thành công! <a href='../views/login.php'>Đăng nhập</a>";
        } else {
            echo "Lỗi khi đăng ký: " . $conn->error;
        }
        $stmt->close();
    }

    $check->close();
}
$conn->close();
?>
