<?php require_once('./database/connection.php') ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $duration = htmlspecialchars($_POST['duration']);
    $id = htmlspecialchars($_POST['id']);

    if (empty($name)) {
        echo json_encode([
            'nameError' => 'Enter course name from PHP!'
        ]);
    } elseif (empty($duration)) {
        echo json_encode([
            'durationError' => 'Enter course duration from PHP!'
        ]);
    } else {
        $sql = "UPDATE `courses` SET `name` = '$name', `duration` = '$duration', `updated_at` = CURRENT_TIMESTAMP() WHERE `id` = $id";
        $is_updated = $conn->query($sql);

        if ($is_updated) {
            echo json_encode([
                'success' => 'Magic has been spelled!'
            ]);
        } else {
            echo json_encode([
                'failure' => 'Magic has failed to spell!'
            ]);
        }
    }
} else {
    echo json_encode([
        'failure' => 'Error encountered!'
    ]);
}
