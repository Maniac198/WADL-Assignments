<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simulate fetching user data from local storage
    $users = json_decode(file_get_contents('users.json'), true) ?: [];

    foreach ($users as $user) {
        if ($email === $user['email'] && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            echo json_encode(array("success" => true));
            exit;
        }
    }

    echo json_encode(array("success" => false, "message" => "Invalid credentials"));
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
