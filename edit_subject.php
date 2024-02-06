<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
<?php
if (intval($_GET['subj']) == 0) {
    redirect_to('content.php');
}

$errors = array();
if (isset($_POST['submit'])) {

    $required_fields = array("menu_name" => 30, "position" => 3);
    foreach ($required_fields as $key => $value) {
        if (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
            $errors[] = $key;
        }
    }
    if (empty($errors)) {
        $query = "UPDATE subjects SET menu_name = ?, position = ?, visible = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siii", $_POST["menu_name"], $_POST["position"], $_POST["visible"], $_GET['subj']);
        $result = $stmt->execute();

        if ($result) {
            // Success
            $message = "Subject updated successfully!";
        } else {
            // Fail
            $message = "Subject updation failed with error: " . $stmt->error;
        }
    } else {
        // Errors occured
        $message = "Errors in " . count($errors) . " fields";
    }
}
?>

<?php get_selected_page(); ?>
<?php include("./includes/header.php") ?>

<table id="structure">
    <tr>
        <td id="navigation">
            <?php echo navigation($sel_subject, $sel_page); ?>
            <br>
        </td>
        <td id="page">
            <h2>
                Edit Subject: <?php echo $sel_subject['menu_name']; ?>
            </h2>

            <!-- Displaying Messages -->
            <?php echo (isset($message)) ? "<p class='message'>{$message}</p>" : ""; ?>

            <!-- displaying Form related Errors -->
            <?php if (!empty($errors)) {
                echo "<p class='errors'>";
                echo "Please review the following fields: <br />";
                foreach ($errors as $error) {
                    echo "-" . $error . "<br />";
                }
                echo "</p>";
            } ?>

            <form action="edit_subject.php?subj=<?php echo urlencode($sel_subject['id']) ?>" method="post">
                <p>Subject name:
                    <input type="text" name="menu_name" id="menu_name" value="<?php echo $sel_subject['menu_name']; ?>" />
                </p>
                <p>Position:
                    <select name="position" id="position">
                        <?php
                        $subjects = get_all_subjects();
                        $subject_count = $subjects->num_rows;
                        for ($i = 1; $i <= $subject_count; $i++) {
                            echo "<option value='{$i}' ";
                            // if position matches i, show as selected
                            echo ($i == $sel_subject['position']) ? "selected" : "";
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>Visible:
                    <input type="radio" name="visible" id="visible_no" value="0" <?php echo ($sel_subject['visible'] == 0) ? "checked" : ""; ?>> No
                    &nbsp;
                    <input type="radio" name="visible" id="visible_yes" value="1" <?php echo ($sel_subject['visible'] == 1) ? "checked" : ""; ?>> Yes

                </p>
                <input type="submit" name="submit" value="Edit Subject">
                &nbsp;
                &nbsp;
                <a href="./controller/delete_subject.php?subj= <?php echo urlencode($sel_subject['id']); ?>" onclick="return confirm('Are you sure to delete subject?')">
                    Delete Subject
                </a>
            </form>
            <br />
            <a href="content.php">Cancel</a>
            <br>
            <br>
            <hr>
            <h2>Pages in this Subject:</h2>
            <?php
            $pages = get_pages_for_subject($sel_subject['id']);
            $output = '<ul class="pages">';
            if ($pages->num_rows > 0) {
                while ($page = $pages->fetch_assoc()) {
                    $output .= "<li> <a href='content.php?page=" . urlencode($page['id']) . "'>{$page["menu_name"]}</a> </li>";
                }
            }
            $output .= '</ul>';
            echo $output;
            ?>
            <br>
            <a href="new_page.php?subj=<?php echo urlencode($sel_subject['id']); ?>">+ Add new Page to this Subject</a>
        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>