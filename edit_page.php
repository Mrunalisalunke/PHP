<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
<?php
if (intval($_GET['page']) == 0) {
    redirect_to('content.php');
}

$errors = array();
if (isset($_POST['submit'])) {

    $required_fields = array("menu_name" => 30, "position" => 3);
    foreach ($required_fields as $key => $value) {
        if ($key === "content" && (!isset($_POST[$key]) || empty($_POST[$key]))) {
            $errors[] = $key;
        } elseif (!isset($_POST[$key]) || empty($_POST[$key]) || strlen(trim($_POST[$key])) > $value) {
            $errors[] = $key;
        }
    }

    if (empty($errors)) {
        $query = "UPDATE pages SET menu_name = ?, position = ?, visible = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siisi", $_POST["menu_name"], $_POST["position"], $_POST["visible"], $_POST["content"], $_GET['page']);
        $result = $stmt->execute();

        if ($result) {
            // Success
            $message = "Page updated successfully!";
        } else {
            // Fail
            $message = "Page updation failed with error: " . $stmt->error;
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
                Edit Page: <?php echo $sel_page['menu_name']; ?>
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

            <form action="edit_page.php?page=<?php echo urlencode($sel_page['id']) ?>" method="post">
                <p>Page name:
                    <input type="text" name="menu_name" id="menu_name" value="<?php echo $sel_page['menu_name']; ?>" />
                </p>
                <p>Position:
                    <select name="position" id="position">
                        <?php
                        $pages = get_pages_for_subject($sel_page['subject_id']);
                        $page_count = $pages->num_rows;
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<option value='{$i}' ";
                            // if position matches i, show as selected
                            echo ($i == $sel_page['position']) ? "selected" : "";
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>Visible:
                    <input type="radio" name="visible" id="visible_no" value="0" <?php echo ($sel_page['visible'] == 0) ? "checked" : ""; ?>> No
                    &nbsp;
                    <input type="radio" name="visible" id="visible_yes" value="1" <?php echo ($sel_page['visible'] == 1) ? "checked" : ""; ?>> Yes

                </p>
                <label for="content">
                    Content:
                </label>
                <p>
                    <textarea name="content" id="content" cols="100" rows="20"><?php echo $sel_page['content'] ?></textarea>
                </p>
                <input type="submit" name="submit" value="Edit Page">
                &nbsp;
                &nbsp;
                <a href="./controller/delete_page.php?page= <?php echo urlencode($sel_page['id']); ?>" onclick="return confirm('Are you sure to delete page?')">
                    Delete Page
                </a>
            </form>
            <br />
            <a href="content.php">Cancel</a>
        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>