<?php require_once('./database/connection.php') ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM `courses` WHERE `id` = $id";
    $is_deleted = $conn->query($sql);
    if ($is_deleted) {
        echo json_encode([
            'success' => 'Magic has been spelled!'
        ]);
    } else {
        echo json_encode([
            'failure' => 'Magic has failed to spell!'
        ]);
    }
}
