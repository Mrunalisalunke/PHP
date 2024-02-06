<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");

$errors = array();
$required_fields = array("username" => 50, "password" => 550);
foreach ($required_fields as $key => $value) {
    if (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
        $errors[] = $key;
    }
}

if (!empty($errors)) {
    redirect_to("../new_user.php", ["msg" => "Please fill all fields!"]);
}

$username = $_POST['username'];
$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$query = "INSERT INTO users ( username, hashed_password ) VALUES ( ?, ? )";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $hashed_password);
$result = $stmt->execute();

if ($result) {
    redirect_to("../new_user.php", ["msg" => "User created Successfully!"]);
} else {
    echo "<p>User creation failed!</p>";
    echo "<p>" . $conn->errno . "</p>";
}

$conn->close();
?>
