<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Ví dụ dữ liệu bài tập (sau này thay bằng dữ liệu từ CSDL)
$assignments = [
    [
        "title" => "Bài tập PHP cơ bản",
        "desc" => "Viết chương trình PHP tính tổng dãy số.",
        "deadline" => "2025-09-15",
        "status" => "Chưa nộp"
    ],
    [
        "title" => "Bài tập HTML & CSS",
        "desc" => "Tạo một trang web giới thiệu bản thân với HTML và CSS.",
        "deadline" => "2025-09-20",
        "status" => "Đang chấm"
    ],
    [
        "title" => "Bài tập MySQL",
        "desc" => "Viết câu lệnh SQL để tạo bảng và truy vấn dữ liệu.",
        "deadline" => "2025-09-25",
        "status" => "Đã nộp"
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập</title>
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
        .assignments {
            display: grid;
            grid-template-columns: repeat(auto-fill,minmax(280px,1fr));
            gap: 24px;
        }
        .assignment-card {
            background: linear-gradient(120deg, #e0f7ef 60%, #b2f7cc 100%);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(25,135,84,0.10);
            padding: 24px;
            border: 1px solid #b2f7cc;
            transition: transform 0.18s;
        }
        .assignment-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 8px 32px rgba(25,135,84,0.18);
        }
        .assignment-card h3 {
            margin: 0 0 10px;
            color: #198754;
        }
        .assignment-card p {
            margin: 0 0 14px;
            color: #333;
        }
        .deadline {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 10px;
        }
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .status.Chưa\ nộp { background: #f8d7da; color: #721c24; }
        .status.Đang\ chấm { background: #fff3cd; color: #856404; }
        .status.Đã\ nộp { background: #d4edda; color: #155724; }
        .btn {
            display: inline-block;
            margin-top: 10px;
            background: linear-gradient(90deg, #198754 60%, #43cea2 100%);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(25,135,84,0.08);
        }
        .btn:hover {
            background: #fff;
            color: #198754;
            border: 1px solid #198754;
        }
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
                    <li><a href="my_courses.php">📚 Khóa học</a></li>
                    <li><a href="assignments.php" class="active">📝 Bài tập</a></li>
                </ul>
            </div>
        </div>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>📝 Danh sách Bài tập</h1>
        <div class="assignments">
            <?php foreach ($assignments as $assignment): ?>
                <div class="assignment-card">
                    <h3><?php echo $assignment["title"]; ?></h3>
                    <p><?php echo $assignment["desc"]; ?></p>
                    <div class="deadline">⏰ Hạn nộp: <?php echo $assignment["deadline"]; ?></div>
                    <span class="status <?php echo $assignment["status"]; ?>">
                        <?php echo $assignment["status"]; ?>
                    </span><br>
                    <?php if ($assignment["status"] == "Chưa nộp"): ?>
                        <a href="submit_assignment.php" class="btn">Nộp bài</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
