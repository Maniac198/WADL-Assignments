<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Simulate storing user data in local storage
    $userData = array("name" => $name, "email" => $email, "password" => $password);
    $users = json_decode(file_get_contents('users.json'), true) ?: [];
    $users[] = $userData;

    file_put_contents('users.json', json_encode($users));

    // Simulate success
    echo json_encode(array("success" => true, "message" => "Signup successful!"));
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
