<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'instructor') {
    header("Location: ../login.php");
    exit();
}

require_once "../../functions/course_functions.php";
$courses = getInstructorCourses($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Khóa học</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f4fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #2e7d32;
            color: #fff;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar h2 {
            margin: 0;
            font-size: 1.3rem;
        }
        .navbar .btn, .navbar .logout-btn {
            background: #fff;
            color: #2e7d32;
            padding: 7px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin-left: 8px;
            font-weight: 500;
            border: none;
            transition: background 0.2s, color 0.2s;
        }
        .navbar .btn:hover, .navbar .logout-btn:hover {
            background: #2e7d32;
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 36px auto 0 auto;
            background: #fff;
            padding: 28px 24px 22px 24px;
            border-radius: 10px;
            box-shadow: 0 4px 18px rgba(25, 118, 210, 0.08);
        }
        h1 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 22px;
            font-size: 1.7rem;
        }
        h2 {
            color: #ffffffff;
            margin-top: 32px;
            margin-bottom: 14px;
            font-size: 1.1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            background: #f8fafc;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(25, 118, 210, 0.04);
        }
        table th, table td {
            border: none;
            padding: 10px 8px;
            text-align: left;
        }
        table th {
            background: #2e7d32;
            color: #fff;
            font-size: 1rem;
        }
        table tr:nth-child(even) {
            background: #e3f0fc;
        }
        table tr:hover {
            background: #2e7d32;
            transition: background 0.2s;
        }
        table td button {
            background: #e53935;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.97rem;
            transition: background 0.2s;
        }
        table td button:hover {
            background: #b71c1c;
        }
        form[action*="add_course"] {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }
        form[action*="add_course"] input[type="text"],
        form[action*="add_course"] textarea {
            padding: 8px 10px;
            border: 1px solid #90caf9;
            border-radius: 4px;
            font-size: 1rem;
            background: #f4f8fb;
            resize: none;
        }
        form[action*="add_course"] textarea {
            min-height: 50px;
            max-height: 140px;
        }
        form[action*="add_course"] button {
            width: 140px;
            align-self: flex-end;
            background: #388e3c;
            color: #fff;
            border: none;
            padding: 8px 0;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 4px;
            transition: background 0.2s;
        }
        form[action*="add_course"] button:hover {
            background: #1976d2;
        }
        @media (max-width: 700px) {
            .container {
                padding: 10px 2vw;
            }
            table th, table td {
                padding: 7px 2px;
                font-size: 0.97rem;
            }
            h1 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Instructor - Quản lý Khóa học 📚</h2>
        <a href="dashboard.php" class="btn">⬅ Quay lại Dashboard</a>
        <a href="../login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Danh sách khóa học của bạn</h1>

        <table border="1" cellpadding="10" cellspacing="0" style="margin: auto; border-collapse: collapse;">
            <tr style="background: #198754; color: #fff;">
                <th>Tên khóa học</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>   
                <th>Hành động</th>
            </tr>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['title'] ?></td>
                    <td><?= $course['description'] ?></td>
                    <td><?= $course['created_at'] ?></td>
                    <td>
                        <form action="../../handle/teacher_process.php" method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="delete_course">
                            <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>➕ Thêm khóa học mới</h2>
        <form action="../../handle/teacher_process.php" method="POST">
            <input type="hidden" name="action" value="add_course">
            <input type="text" name="title" placeholder="Tên khóa học" required>
            <textarea name="description" placeholder="Mô tả khóa học" required></textarea>
            <button type="submit">Thêm khóa học</button>
        </form>
    </div>
</body>
</html>
