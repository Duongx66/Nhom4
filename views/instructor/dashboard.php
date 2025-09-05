<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'instructor') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Instructor Dashboard</title>
  <style>
    body {
      background: linear-gradient(120deg, #e3f0ff 0%, #b6d0f7 100%);
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #222;
    }
    .navbar {
      background: #1976d2;
      color: #fff;
      padding: 0 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom-left-radius: 18px;
      border-bottom-right-radius: 18px;
      box-shadow: 0 2px 8px rgba(25,118,210,0.10);
      min-height: 70px;
      position: relative;
    }
    .navbar img {
      height: 52px;
      border-radius: 50%;
      background: #fff;
      padding: 4px;
      box-shadow: 0 2px 8px rgba(25,118,210,0.08);
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
      color: #1976d2;
    }
    .logout-btn {
      background: #fff;
      color: #1976d2;
      padding: 8px 18px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 500;
      border: 1px solid #1976d2;
      transition: background 0.2s, color 0.2s;
      margin-left: 18px;
    }
    .logout-btn:hover {
      background: #1976d2;
      color: #fff;
    }
    .container {
      max-width: 950px;
      margin: 40px auto 0 auto;
      background: #fff;
      padding: 32px 36px 28px 36px;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(25,118,210,0.12);
    }
    h1 {
      color: #1976d2;
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
      background: linear-gradient(120deg, #e3f0ff 60%, #b6d0f7 100%);
      border-radius: 14px;
      box-shadow: 0 4px 18px rgba(25,118,210,0.10);
      padding: 28px 24px 22px 24px;
      min-width: 240px;
      max-width: 300px;
      flex: 1 1 260px;
      margin-bottom: 18px;
      text-align: center;
      border: 1px solid #b6d0f7;
      transition: transform 0.18s;
    }
    .card:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow: 0 8px 32px rgba(25,118,210,0.18);
    }
    .card h3 {
      color: #1976d2;
      margin-bottom: 12px;
      font-size: 1.2rem;
    }
    .card p {
      color: #333;
      margin-bottom: 18px;
      font-size: 1rem;
    }
    .card a {
      background: linear-gradient(90deg, #1976d2 60%, #43cea2 100%);
      color: #fff;
      border: none;
      padding: 10px 28px;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
      box-shadow: 0 2px 8px rgba(25,118,210,0.08);
      display: inline-block;
    }
    .card a:hover {
      background: #fff;
      color: #1976d2;
      border: 1px solid #1976d2;
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
                Xin chào, <?php echo $_SESSION['full_name']; ?> 👨‍🏫
            </h2>
            <div class="dashboard-links">
                <ul>
                    <li><a href="dashboard.php" class="active">🏠 Trang chủ</a></li>
                    <li><a href="lessons.php">📚 Bài giảng</a></li>
                    <li><a href="assignments.php">📝 Bài tập</a></li>
                    <li><a href="grading.php">✅ Chấm điểm</a></li>
                </ul>
            </div>
        </div>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Trang giảng viên</h1>
        <p>Chào mừng bạn đến với giao diện quản lý dành cho giảng viên.</p>

        <div class="features">
            <div class="card">
                <img src="../../assets/teaching.png" alt="Teaching" style="height:60px;margin-bottom:10px;">
                <h3>📚 Khóa học của bạn</h3>
                <p>Quản lý, chỉnh sửa hoặc tạo mới khóa học.</p>
                <a href="lessons.php">Quản lý khóa học</a>
            </div>

            <div class="card">
                <img src="../../assets/assignment.png" alt="Assignment" style="height:60px;margin-bottom:10px;">
                <h3>📝 Bài tập</h3>
                <p>Thêm bài tập, đề thi hoặc cập nhật nội dung.</p>
                <a href="assignments.php">Quản lý bài tập</a>
            </div>

            <div class="card">
                <img src="../../assets/grading.png" alt="Grading" style="height:60px;margin-bottom:10px;">
                <h3>✅ Chấm điểm</h3>
                <p>Xem và chấm điểm bài tập của học viên.</p>
                <a href="grading.php">Chấm điểm</a>
            </div>
        </div>
    </div>
</body>
</html>
