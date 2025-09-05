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
    <title>Admin Dashboard</title>
    <style>
        body {
            background: linear-gradient(120deg, #232526 0%, #414345 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #f5f5f5;
        }
        .navbar {
            background: #111;
            color: #fff;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.18);
            min-height: 70px;
            position: relative;
        }
        .navbar img {
            height: 52px;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        }
        .navbar-center {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .navbar h2 {
            margin: 0;
            font-size: 1.3rem;
            letter-spacing: 1px;
            color: #fff;
            font-weight: 600;
        }
        .navbar .dashboard-links {
            margin-top: 4px;
        }
        .dashboard-links ul {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .dashboard-links a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 5px;
            transition: background 0.2s, color 0.2s;
        }
        .dashboard-links a.active,
        .dashboard-links a:hover {
            background: #ffd600;
            color: #232526;
        }
        .logout-btn {
            background: #fff;
            color: #232526;
            padding: 8px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            border: 1px solid #444;
            transition: background 0.2s, color 0.2s;
            margin-left: 18px;
        }
        .logout-btn:hover {
            background: #f44336;
            color: #fff;
            border-color: #f44336;
        }
        .container {
            max-width: 950px;
            margin: 40px auto 0 auto;
            background: rgba(30, 30, 30, 0.97);
            padding: 32px 36px 28px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.22);
        }
        h1 {
            color: #ffd600;
            text-align: center;
            margin-bottom: 28px;
            font-size: 2.1rem;
            letter-spacing: 1px;
        }
        p {
            color: #bbb;
            text-align: center;
            margin-bottom: 32px;
        }
        .features {
            display: flex;
            gap: 28px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .card {
            background: linear-gradient(120deg, #232526 60%, #414345 100%);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.13);
            padding: 28px 24px 22px 24px;
            min-width: 240px;
            max-width: 300px;
            flex: 1 1 260px;
            margin-bottom: 18px;
            text-align: center;
            border: 1px solid #333;
            transition: transform 0.18s;
        }
        .card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        }
        .card h3 {
            color: #ffd600;
            margin-bottom: 12px;
            font-size: 1.2rem;
        }
        .card p {
            color: #e0e0e0;
            margin-bottom: 18px;
            font-size: 1rem;
        }
        .btn {
            background: linear-gradient(90deg, #ffd600 60%, #ff9800 100%);
            color: #232526;
            border: none;
            padding: 10px 28px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            box-shadow: 0 2px 8px rgba(255, 214, 0, 0.08);
        }
        .btn:hover {
            background: #fff;
            color: #111;
        }
        @media (max-width: 900px) {
            .features {
                flex-direction: column;
                gap: 18px;
            }
            .container {
                padding: 16px 4vw;
            }
            .navbar-center {
                align-items: flex-start;
            }
            .dashboard-links ul {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="../../docs/logo/Logo.png" alt="Logo">
        <div class="navbar-center">
            <h2>
                Xin chào, Admin <?php echo $_SESSION['full_name']; ?> 👑
            </h2>
            <div class="dashboard-links">
                <ul>
                    <li><a href="dashboard.php" class="active">🏠 Trang chủ</a></li>
                    <li><a href="users.php">👥 Người dùng</a></li>
                    <li><a href="courses.php">📚 Khóa học</a></li>
                    <li><a href="reports.php">📊 Báo cáo</a></li>
                </ul>
            </div>
        </div>
        <a href="../login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Bảng điều khiển quản trị</h1>
        <p>Quản lý toàn bộ hệ thống e-learning.</p>

        <div class="features">
            <div class="card">
                <h3>👥 Quản lý người dùng</h3>
                <p>Xem, thêm, sửa, xóa tài khoản người dùng.</p>
                <a href="users.php" class="btn">Quản lý</a>
            </div>

            <div class="card">
                <h3>📚 Quản lý khóa học</h3>
                <p>Thêm mới, chỉnh sửa hoặc xóa các khóa học.</p>
                <a href="courses.php" class="btn">Quản lý</a>
            </div>

            <div class="card">
                <h3>📊 Báo cáo & Thống kê</h3>
                <p>Xem báo cáo chi tiết về học viên, giảng viên và tiến độ.</p>
                <a href="reports.php" class="btn">Xem báo cáo</a>
            </div>
        </div>
    </div>
</body>
</html>
