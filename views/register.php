<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="../css/register.css"> 
</head>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form action="../handle/register_process.php" method="POST">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="full_name">Họ và tên</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="role">Vai trò</label>
            <select id="role" name="role" required>
                <option value="student">Học viên</option>
                <option value="instructor">Giảng viên</option>
            </select>

            <button type="submit">Đăng ký</button>
        </form>
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</body>
</html>
