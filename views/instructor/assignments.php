<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'instructor') {
    header("Location: ../login.php");
    exit();
}
// Giả sử bạn đã có hàm lấy danh sách bài tập của instructor
// require_once "../../functions/assignment_functions.php";
// $assignments = getInstructorAssignments($_SESSION['user_id']);
$assignments = [
    [
        'title' => 'Bài tập 1',
        'description' => 'Giải các bài toán về mảng.',
        'deadline' => '2025-09-10',
        'id' => 1
    ],
    [
        'title' => 'Bài tập 2',
        'description' => 'Viết chương trình quản lý sinh viên.',
        'deadline' => '2025-09-15',
        'id' => 2
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý bài tập</title>
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
        .btn {
            background: #1976d2;
            color: #fff;
            border: none;
            padding: 7px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            margin: 0 4px;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background: #388e3c;
        }
        .add-form {
            margin-top: 32px;
            background: #f8fafc;
            padding: 18px 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(25,118,210,0.04);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .add-form h2 {
            color: #1976d2;
            margin-bottom: 16px;
            font-size: 1.2rem;
        }
        .add-form input, .add-form textarea {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 12px;
            border: 1px solid #b6d4fe;
            border-radius: 5px;
            font-size: 1rem;
            background: #f4f8fb;
        }
        .add-form button {
            background: #1976d2;
            color: #fff;
            border: none;
            padding: 9px 0;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            width: 140px;
            cursor: pointer;
            transition: background 0.2s;
            float: right;
        }
        .add-form button:hover {
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
        <h2>Quản lý bài tập</h2>
        <a href="../../views/login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Danh sách bài tập</h1>
        <table>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Hạn nộp</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($assignments as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['title']) ?></td>
                <td><?= htmlspecialchars($a['description']) ?></td>
                <td><?= htmlspecialchars($a['deadline']) ?></td>
                <td>
                    <a href="#" class="btn">Sửa</a>
                    <a href="#" class="btn" style="background:#f44336;">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <form class="add-form" action="#" method="POST">
            <h2>➕ Thêm bài tập mới</h2>
            <input type="text" name="title" placeholder="Tiêu đề bài tập" required>
            <textarea name="description" placeholder="Mô tả bài tập" required></textarea>
            <input type="date" name="deadline" required>
            <button type="submit">Thêm bài tập</button>
        </form>