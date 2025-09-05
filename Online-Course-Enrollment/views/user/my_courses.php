<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Ví dụ dữ liệu khóa học (sau này thay bằng dữ liệu từ CSDL)
$courses = [
    [
        "title" => "Lập trình PHP cơ bản",
        "desc" => "Khóa học nền tảng về PHP cho người mới bắt đầu.",
        "status" => "Đang học"
    ],
    [
        "title" => "Thiết kế Web với HTML, CSS",
        "desc" => "Khóa học hướng dẫn xây dựng giao diện web chuyên nghiệp.",
        "status" => "Hoàn thành"
    ],
    [
        "title" => "Cơ sở dữ liệu MySQL",
        "desc" => "Học cách thiết kế và quản lý cơ sở dữ liệu MySQL.",
        "status" => "Chưa bắt đầu"
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Khóa học của tôi</title>
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
        }
        .navbar img {
            height: 52px;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
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
            color: #fff;
            font-weight: 600;
        }
        .dashboard-links ul {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin: 6px 0 0 0;
            padding: 0;
            list-style: none;
        }
        .dashboard-links a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 5px;
            transition: background 0.2s;
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
        }
        .logout-btn:hover {
            background: #198754;
            color: #fff;
        }
        .container {
            max-width: 950px;
            margin: 40px auto;
            background: #fff;
            padding: 32px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(25,135,84,0.12);
        }
        h1 {
            color: #198754;
            text-align: center;
            margin-bottom: 28px;
            font-size: 2rem;
        }
        .courses {
            display: grid;
            grid-template-columns: repeat(auto-fill,minmax(280px,1fr));
            gap: 24px;
        }
        .course-card {
            background: linear-gradient(120deg, #e0f7ef 60%, #b2f7cc 100%);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(25,135,84,0.10);
            padding: 24px;
            border: 1px solid #b2f7cc;
            transition: transform 0.18s;
        }
        .course-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 8px 32px rgba(25,135,84,0.18);
        }
        .course-card h3 {
            margin: 0 0 10px;
            color: #198754;
        }
        .course-card p {
            margin: 0 0 14px;
            color: #333;
        }
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .status.Đang\ học { background: #fff3cd; color: #856404; }
        .status.Hoàn\ thành { background: #d4edda; color: #155724; }
        .status.Chưa\ bắt\ đầu { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="../../docs/logo/Logo.png" alt="Logo">
        <div class="navbar-center">
            <h2>Xin chào, <?php echo $_SESSION['full_name']; ?> 👋</h2>
            <div class="dashboard-links">
                <ul>
                    <li><a href="dashboard.php">🏠 Trang chủ</a></li>
                    <li><a href="my_courses.php" class="active">📚 Khóa học</a></li>
                    <li><a href="assignments.php">📝 Bài tập</a></li>
                </ul>
            </div>
        </div>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>📚 Khóa học của tôi</h1>
        <div class="courses">
            <?php foreach ($courses as $course): ?>
                <div class="course-card">
                    <h3><?php echo $course["title"]; ?></h3>
                    <p><?php echo $course["desc"]; ?></p>
                    <span class="status <?php echo $course["status"]; ?>">
                        <?php echo $course["status"]; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
