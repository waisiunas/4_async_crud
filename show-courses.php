<?php require_once('./database/connection.php') ?>

<?php
$sql = "SELECT * FROM `courses`";
$result = $conn->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);
if(count($courses) > 0) {
    echo json_encode($courses);
} else {
    echo json_encode([
        'empty' => "No record found!"
    ]);
}
