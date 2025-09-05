<?php
session_start();
require_once __DIR__ . '/../functions/course_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_course') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor_id = $_SESSION['user_id']; // Sử dụng user_id

    if (!$instructor_id) {
        die("Lỗi: instructor_id không tồn tại trong session!");
    }

    addCourse($title, $description, $instructor_id);
    header("Location: ../views/instructor/lessons.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == "add_course") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $instructor_id = $_SESSION['user_id'];

        if (addCourse($title, $description, $instructor_id)) {
            header("Location: ../views/instructor/lessons.php?success=1");
        } else {
            header("Location: ../views/instructor/lessons.php?error=1");
        }
    }

    if ($action == "delete_course") {
        $course_id = $_POST['course_id'];

        if (deleteCourse($course_id)) {
            header("Location: ../views/instructor/lessons.php?deleted=1");
        } else {
            header("Location: ../views/instructor/lessons.php?error=1");
        }
    }
}
