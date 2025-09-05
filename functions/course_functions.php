<?php
require_once __DIR__ . "/db_connection.php"; // kết nối CSDL
$conn = getDbConnection();
// Lấy danh sách khóa học của instructor
function getInstructorCourses($instructor_id) {
    global $conn;
    $sql = "SELECT * FROM courses WHERE instructor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $instructor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
    

// var_dump($_SESSION['instructor_id']); exit;
// Thêm khóa học
function addCourse($title, $description, $instructor_id) {
    global $conn;
    $sql = "INSERT INTO courses (title, description, instructor_id, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssi", $title, $description, $instructor_id);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    return true;
}

// Xóa khóa học
function deleteCourse($course_id) {
    global $conn;
    $sql = "DELETE FROM courses WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    return $stmt->execute();
}
