<?php
require_once __DIR__ . "/db_connection.php"; // kết nối CSDL
$conn = getDbConnection();
// Lấy tất cả user
function getAllUsers() {
    global $conn;
    $users = [];

    $sql = "SELECT user_id, username, email, full_name, role FROM users";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    } else {
        // debug lỗi SQL
        echo "Lỗi SQL: " . $conn->error;
    }
    return $users;
}

function addUser($username, $password, $email, $full_name, $role) {
    global $conn;
    $sql = "INSERT INTO users (username, password, email, full_name, role)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $email, $full_name, $role);
    return $stmt->execute();
}

function updateUser($user_id, $username, $email, $full_name, $role) {
    global $conn;

    $sql = "UPDATE users 
            SET username = ?, email = ?, full_name = ?, role = ? 
            WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("❌ Lỗi prepare: " . $conn->error . " | SQL: " . $sql);
    }

    $stmt->bind_param("ssssi", $username, $email, $full_name, $role, $user_id);

    if ($stmt->execute()) {
        return true;
    } else {
        die("❌ Lỗi execute: " . $stmt->error);
    }
}

function deleteUser($user_id) {
    global $conn;

    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Lỗi prepare: " . $conn->error); // Debug dễ hiểu hơn
    }

    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        return true;
    } else {
        die("Lỗi execute: " . $stmt->error);
    }
}
