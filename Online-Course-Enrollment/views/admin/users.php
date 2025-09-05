<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once "../../functions/admin_functions.php";
$users = getAllUsers();
if (!$users || count($users) == 0) {
    echo "<p style='color:red; text-align:center;'>⚠ Không có người dùng nào trong CSDL</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="../../css/db_admin.css">
</head>
<body>
    <div class="navbar">
        <h2>Admin - Quản lý người dùng 👥</h2>
        <a href="dashboard.php" class="btn">⬅ Quay lại Dashboard</a>
        <a href="../login.php" class="logout-btn">Đăng xuất</a>
    </div>

    <div class="container">
        <h1>Danh sách người dùng</h1>

        <table border="1" cellpadding="10" cellspacing="0" style="margin: auto; border-collapse: collapse;">
            <tr style="background: #0d6efd; color: #fff;">
                <th>Username</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($users as $u): ?>
                <?php if ($u['role'] == 'user' || $u['role'] == 'instructor'): ?>
                    <tr>
                        <td><?= $u['username'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['full_name'] ?></td>
                        <td><?= ucfirst($u['role']) ?></td>
                        <td>
                            <!-- Sửa user -->
                            <form action="../../handle/admin_process.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="update_user">
                                <input type="hidden" name="id" value="<?= $u['user_id'] ?>"> <!-- thêm dòng này -->
                                <input type="text" name="username" value="<?= $u['username'] ?>" required>
                                <input type="email" name="email" value="<?= $u['email'] ?>" required>
                                <input type="text" name="full_name" value="<?= $u['full_name'] ?>" required>
                                <select name="role">
                                    <option value="user" <?= $u['role']=="user"?"selected":"" ?>>User</option>
                                    <option value="instructor" <?= $u['role']=="instructor"?"selected":"" ?>>Instructor</option>
                                    <option value="admin" <?= $u['role']=="admin"?"selected":"" ?>>Admin</option>
                                </select>
                                <button type="submit">Cập nhật</button>
                            </form>

                            <!-- Xóa user -->
                            <form action="../../handle/admin_process.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="id" value="<?= $u['user_id'] ?>"> <!-- thêm dòng này -->
                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa user này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>   
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

        <h2>➕ Thêm người dùng mới</h2>
        <form action="../../handle/admin_process.php" method="POST">
            <input type="hidden" name="action" value="add_user">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="full_name" placeholder="Họ tên" required>
            <select name="role">
                <option value="user">User</option>
                <option value="instructor">Instructor</option>
            </select>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
 