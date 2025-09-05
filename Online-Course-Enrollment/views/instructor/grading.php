<?php

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'instructor') {
    header("Location: ../login.php");
    exit();
}
// Giả sử bạn đã có hàm lấy danh sách bài nộp của học viên cho instructor
// require_once "../../functions/grading_functions.php";
// $submissions = getInstructorSubmissions($_SESSION['user_id']);
$submissions = [
    [
        'student_name' => 'Nguyễn Văn A',
        'assignment' => 'Bài tập 1',
        'submitted_at' => '2025-09-01 10:00',
        'file' => '#',
        'grade' => '',
        'id' => 1
    ],
    [
        'student_name' => 'Trần Thị B',
        'assignment' => 'Bài tập 2',
        'submitted_at' => '2025-09-02 14:30',
        'file' => '#',
        'grade' => '8.5',
        'id' => 2
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chấm điểm bài tập</title>
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
        }
        .navbar img {
            height: 48px;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(25,118,210,0.08);
        }
        .navbar h2 {
            margin: 0 18px;
            font-size: 1.3rem;
            color: #fff;
            font-weight: 600;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #f8fafc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(25,118,210,0.04);
        }
        th, td {
            padding: 12px 10px;
            text-align: center;
        }
        th {
            background: #1976d2;
            color: #fff;
            font-size: 1rem;
        }
        tr:nth-child(even) {
            background: #e3f0ff;
        }
        tr:hover {
            background: #bbdefb;
            transition: background 0.2s;
        }
        .grade-form input[type="number"] {
            width: 60px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #b6d4fe;
            font-size: 1rem;
        }
        .grade-form button {
            background: #1976d2;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.97rem;
            margin-left: 8px;
            transition: background 0.2s;
        }
        .grade-form button:hover {
            background: #388e3c;
        }
        @media (max-width: 700px) {
            .container {
                padding: 12px 4vw;
            }
            th, td {
                padding: 8px 4px;
                font-size: 0.97rem;
            }
            h1 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="../../assets/Logo.png" alt="Logo">
        <h2>Chấm điểm bài tập</h2>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Danh sách bài nộp của học viên</h1>
        <table>
            <tr>
                <th>Học viên</th>
                <th>Bài tập</th>
                <th>Thời gian nộp</th>
                <th>Tệp bài nộp</th>
                <th>Điểm</th>
                <th>Chấm điểm</th>
            </tr>
            <?php foreach ($submissions as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s['student_name']) ?></td>
                <td><?= htmlspecialchars($s['assignment']) ?></td>
                <td><?= htmlspecialchars($s['submitted_at']) ?></td>
                <td>
                    <a href="<?= $s['file'] ?>" target="_blank">Xem file</a>
                </td>
                <td>
                    <?= $s['grade'] !== '' ? htmlspecialchars($s['grade']) : '<span style="color:#f44336;">Chưa chấm</span>' ?>
                </td>
                <td>
                    <form class="grade-form" action="#" method="POST">
                        <input type="hidden" name="submission_id" value="<?= $s['id'] ?>">
                        <input type="number" name="grade" min="0" max="10" step="0.1" value="<?= $s['grade'] ?>" required>
                        <button type="submit">Lưu</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>