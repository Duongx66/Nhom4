<?php
session_start();
require_once __DIR__ . "/../functions/db_connection.php";

// Thêm dòng này để lấy kết nối database
$conn = getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Bỏ giải mã mật khẩu, so sánh trực tiếp
    if ($user && $password === $user['password']) {
        // Lưu session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['full_name'] = $user['full_name']; // Thêm dòng này

        // Điều hướng theo role
        if ($user['role'] === 'user') {
            header("Location: ../views/user/dashboard.php");
        } elseif ($user['role'] === 'instructor') {
            header("Location: ../views/instructor/dashboard.php");
        } elseif ($user['role'] === 'admin') {
            header("Location: ../views/admin/dashboard.php");
        } else {
            echo "Vai trò không hợp lệ!";
        }
        exit();
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>
