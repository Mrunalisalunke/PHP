<?php
require_once("../includes/session.php");
require_once("../includes/connection.php");
require_once("../includes/functions.php");

$errors = array();
$required_fields = array("username" => 50, "password" => 50);
foreach ($required_fields as $key => $value) {
    if (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
        $errors[] = $key;
    }
}

if (!empty($errors)) {
    redirect_to("../login.php", ["msg" => "Please fill all fields!"]);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$result = $stmt->execute();

if ($result) {
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if (isset($user) && $user['username']) {
        if (password_verify($password, $user['hashed_password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            redirect_to("../staff.php");
        } else {
            redirect_to("../login.php", ["msg" => "Wrong Password!"]);
        }
    } else {
        redirect_to("../login.php", ["msg" => "Wrong Username!"]);
    }
} else {
    redirect_to("../login.php", ["msg" => "Error Occured!"]);
}

$conn->close();
