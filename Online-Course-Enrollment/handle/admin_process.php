<?php
session_start();
require_once __DIR__ . "/../functions/admin_functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';

    if ($action == "add_user") {
        $username = $_POST['username'];
        $password = $_POST['password']; // không mã hóa
        $email = $_POST['email'];
        $full_name = $_POST['full_name'];
        $role = $_POST['role'];

        if (addUser($username, $password, $email, $full_name, $role)) {
            $_SESSION['success'] = "Thêm thành công!";
        } else {
            $_SESSION['message'] = "❌ Lỗi: Không thể thêm người dùng!";
        }
    }

    elseif ($action == "update_user") {
        // Cần thêm input hidden id vào form sửa user
        $id = $_POST['id'] ?? 0;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $full_name = $_POST['full_name'];
        $role = $_POST['role'];

        if (updateUser($id, $username, $email, $full_name, $role)) {
            $_SESSION['message'] = "✅ Cập nhật người dùng thành công!";
        } else {
            $_SESSION['message'] = "❌ Lỗi: Không thể cập nhật người dùng!";
        }
    }

    elseif ($action == "delete_user") {
        $id = $_POST['id'] ?? 0;

        if (deleteUser($id)) {
            $_SESSION['message'] = "🗑️ Xóa người dùng thành công!";
        } else {
            $_SESSION['message'] = "❌ Lỗi: Không thể xóa người dùng!";
        }
    }
}

// Sau khi xử lý xong, quay lại trang quản lý
header("Location: ../views/admin/users.php");
exit();
