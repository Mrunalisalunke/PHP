<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
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
                Add Subject
            </h2>
            <form action="./controller/create_subject.php" method="post">
                <p>Subject name:
                    <input type="text" name="menu_name" id="menu_name" />
                </p>
                <p>Position:
                    <select name="position" id="position">
                        <?php
                        $subjects = get_all_subjects();
                        $subject_count = $subjects->num_rows;
                        for ($i = 1; $i <= $subject_count + 1; $i++) {
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>Visible:
                    <input type="radio" name="visible" id="visible_no" value="0"> No
                    &nbsp;
                    <input type="radio" name="visible" id="visible_yes" value="1"> Yes
                </p>

                <input type="submit" value="Add Subject">
            </form>
            <br />
            <a href="content.php">Cancel</a>
        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>