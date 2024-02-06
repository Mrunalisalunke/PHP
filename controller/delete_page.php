<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");

if (intval($_GET['page']) == 0) {
    redirect_to('content.php');
}

$id = $_GET['page'];
$query = "DELETE FROM pages WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$result = $stmt->execute();

if ($result) {
    redirect_to("../content.php");
} else {
    // Deletion failed
    echo "<p>Page Deletion failed!</p>";
    echo "<p>" . $conn->errno . "</p>";
}
$conn->close();
