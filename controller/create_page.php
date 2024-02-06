<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");

if (intval($_GET['subj']) == 0) {
    redirect_to('content.php');
}

$id = $_GET['subj'];
$errors = array();
$required_fields = array("menu_name" => 30, "position" => 3);
foreach ($required_fields as $key => $value) {
    if ($key === "content" && (!isset($_POST[$key]) || empty($_POST[$key]))) {
        $errors[] = $key;
    } elseif (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
        $errors[] = $key;
    }
}

if (!empty($errors)) {
    redirect_to("../new_page.php");
}

$subject_id = $id;
$menu_name = $_POST['menu_name'];
$position = $_POST['position'];
$content = $_POST['content'];
$visible = ($_POST['visible'] == 1 ? 1 : 0);

$query = "INSERT INTO pages ( subject_id, menu_name, position, visible, content ) VALUES ( ?, ?, ?, ?, ? )";
$stmt = $conn->prepare($query);
$stmt->bind_param("isiis", $subject_id, $menu_name, $position, $visible, $content);
$result = $stmt->execute();

if ($result) {
    redirect_to("../content.php");
} else {
    echo "<p>Page Creation failed!</p>";
    echo "<p>" . $conn->errno . "</p>";
}

$conn->close();
