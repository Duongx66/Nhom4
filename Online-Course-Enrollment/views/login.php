<?php include("../functions/db_connection.php"); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - E-Learning</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            padding: 38px 32px 28px 32px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(25, 118, 210, 0.10);
            width: 350px;
            text-align: center;
        }

        .logo {
            margin-bottom: 18px;
        }

        .logo img {
            height: 200px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }

        h2 {
            color: #1976d2;
            margin-bottom: 24px;
            font-size: 2rem;
            letter-spacing: 1px;
        }

        .input-group {
            margin-bottom: 18px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            color: #1976d2;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #b6d4fe;
            border-radius: 6px;
            font-size: 1rem;
            background: #f4f8fb;
        }

        .btn {
            width: 100%;
            background: linear-gradient(90deg, #1976d2 60%, #43cea2 100%);
            color: #fff;
            border: none;
            padding: 12px 0;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #388e3c;
        }

        .register-link {
            margin-top: 18px;
            font-size: 0.98rem;
        }

        .register-link a {
            color: #1976d2;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="../docs//logo/Logo.png" alt="E-Learning Logo">
            </div>
            <h2>Đăng nhập E-Learning</h2>
            <form action="../handle/login_process.php" method="POST">
                <div class="input-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username" required>
                </div>
                <div class="input-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn">Đăng nhập</button>
                <p class="register-link">
                    Chưa có tài khoản? <a href="register.php">Đăng ký</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
