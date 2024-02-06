<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");

$errors = array();
$required_fields = array("menu_name" => 30, "position" => 3);
foreach ($required_fields as $key => $value) {
    if (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
        $errors[] = $key;
    }
}

if (!empty($errors)) {
    redirect_to("../new_subject.php");
}


$menu_name = $_POST['menu_name'];
$position = $_POST['position'];
$visible = ($_POST['visible'] == 1 ? 1 : 0);

$query = "INSERT INTO subjects ( menu_name, position, visible ) VALUES ( ?, ?, ? )";
$stmt = $conn->prepare($query);
$stmt->bind_param("sii", $menu_name, $position, $visible);
$result = $stmt->execute();

if ($result) {
    redirect_to("../content.php");
} else {
    echo "<p>Subject Creation failed!</p>";
    echo "<p>" . $conn->errno . "</p>";
}

$conn->close();
