<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khóa học</title>
    <link rel="stylesheet" href="../../css/db_admin.css">
</head>
<body>
    <div class="navbar">
        <h2>Admin - Quản lý khóa học 📚</h2>
        <a href="dashboard.php" class="btn">⬅ Quay lại Dashboard</a>
        <a href="../login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Danh sách khóa học</h1>
        <p>Chức năng này sẽ cho phép quản lý các khóa học.</p>

        <table border="1" cellpadding="10" cellspacing="0" style="margin: auto; border-collapse: collapse;">
            <tr style="background: #198754; color: #fff;">
                <th>ID</th>
                <th>Tên khóa học</th>
                <th>Giảng viên</th>
                <th>Học viên</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Lập trình PHP cơ bản</td>
                <td>Nguyễn Văn A</td>
                <td>50</td>
                <td>
                    <button>Sửa</button>
                    <button>Xóa</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
