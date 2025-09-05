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
    <title>Báo cáo & Thống kê</title>
    <link rel="stylesheet" href="../../css/db_admin.css">
</head>
<body>
    <div class="navbar">
        <h2>Admin - Báo cáo & Thống kê 📊</h2>
        <a href="dashboard.php" class="btn">⬅ Quay lại Dashboard</a>
        <a href="../login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Báo cáo hệ thống</h1>
        <p>Thống kê số lượng học viên, giảng viên, khóa học.</p>

        <div class="features">
            <div class="card">
                <h3>👥 Học viên</h3>
                <p>Tổng số: <b>150</b></p>
            </div>
            <div class="card">
                <h3>👨‍🏫 Giảng viên</h3>
                <p>Tổng số: <b>10</b></p>
            </div>
            <div class="card">
                <h3>📚 Khóa học</h3>
                <p>Tổng số: <b>25</b></p>
            </div>
        </div>
    </div>
</body>
</html>
