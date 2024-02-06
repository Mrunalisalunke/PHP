<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");

if (intval($_GET['subj']) == 0) {
    redirect_to('content.php');
}

$id = $_GET['subj'];
if ($subject = get_subject_by_id($id)) {
    $query = "DELETE FROM subjects WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        redirect_to("../content.php");
    } else {
        // Deletion failed
        echo "<p>Subject Deletion failed!</p>";
        echo "<p>" . $conn->errno . "</p>";
    }
} else {
    // Subject was not found
    redirect_to("../content.php");
}
$conn->close();
