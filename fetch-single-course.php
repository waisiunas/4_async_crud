<?php require_once('./database/connection.php') ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `courses` WHERE `id` = $id";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();
    echo json_encode($course);
}
