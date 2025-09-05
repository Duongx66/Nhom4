<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <style>
        body {
            background: linear-gradient(120deg, #e0f7ef 0%, #b2f7cc 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #222;
        }
        .navbar {
            background: #198754;
            color: #fff;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            box-shadow: 0 2px 8px rgba(25,135,84,0.10);
            min-height: 70px;
            position: relative;
        }
        .navbar img {
            height: 52px;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(25,135,84,0.08);
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
            background: #43cea2;
            color: #198754;
        }
        .logout-btn {
            background: #fff;
            color: #198754;
            padding: 8px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            border: 1px solid #198754;
            transition: background 0.2s, color 0.2s;
            margin-left: 18px;
        }
        .logout-btn:hover {
            background: #198754;
            color: #fff;
        }
        .container {
            max-width: 950px;
            margin: 40px auto 0 auto;
            background: #fff;
            padding: 32px 36px 28px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(25,135,84,0.12);
        }
        h1 {
            color: #198754;
            text-align: center;
            margin-bottom: 28px;
            font-size: 2.1rem;
            letter-spacing: 1px;
        }
        p {
            color: #444;
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
            background: linear-gradient(120deg, #e0f7ef 60%, #b2f7cc 100%);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(25,135,84,0.10);
            padding: 28px 24px 22px 24px;
            min-width: 240px;
            max-width: 300px;
            flex: 1 1 260px;
            margin-bottom: 18px;
            text-align: center;
            border: 1px solid #b2f7cc;
            transition: transform 0.18s;
        }
        .card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 8px 32px rgba(25,135,84,0.18);
        }
        .card h3 {
            color: #198754;
            margin-bottom: 12px;
            font-size: 1.2rem;
        }
        .card p {
            color: #333;
            margin-bottom: 18px;
            font-size: 1rem;
        }
        .btn {
            background: linear-gradient(90deg, #198754 60%, #43cea2 100%);
            color: #fff;
            border: none;
            padding: 10px 28px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            box-shadow: 0 2px 8px rgba(25,135,84,0.08);
        }
        .btn:hover {
            background: #fff;
            color: #198754;
            border: 1px solid #198754;
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
                Xin chào, <?php echo $_SESSION['full_name']; ?> 👋
            </h2>
            <div class="dashboard-links">
                <ul>
                    <li><a href="dashboard.php" class="active">🏠 Trang chủ</a></li>
                    <li><a href="my_courses.php">📚 Khóa học</a></li>
                    <li><a href="assignments.php">📝 Bài tập</a></li>
                </ul>
            </div>
        </div>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Trang học viên</h1>
        <p>Chào mừng bạn đến với hệ thống học online.</p>

        <div class="features">
            <div class="card">
                <h3>📚 Khóa học của tôi</h3>
                <p>Xem danh sách các khóa học bạn đã đăng ký.</p>
                <a href="my_courses.php" class="btn">Xem ngay</a>
            </div>

            <div class="card">
                <h3>📝 Bài tập</h3>
                <p>Làm bài tập và nộp bài trực tuyến.</p>
                <a href="assignments.php" class="btn">Làm bài</a>
            </div>

        </div>
    </div>
</body>
</html>
