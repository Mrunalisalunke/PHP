<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
<?php get_selected_page(); ?>
<?php include("./includes/header.php") ?>

<table id="structure">
    <tr>
        <td id="navigation">
            <?php echo navigation($sel_subject, $sel_page); ?>
            <br>
            <a href="new_subject.php">+ Add new Subject</a>
        </td>
        <td id="page">
            <!-- Page displayed after a selection -->
            <?php
            if (isset($sel_subject['menu_name'])) {
                echo "<h2>" . $sel_subject['menu_name'] . "</h2>";
            }
            if (isset($sel_page['menu_name'])) {
                echo "<h2>" . $sel_page['menu_name'] . "</h2>";
                echo "<div class='page-content'>
                            {$sel_page['content']}
                        </div>";
                echo "<br />";
                echo "<a href='edit_page.php?page=" . urlencode($sel_page['id']) . "'>Edit Page</a>";
            } else {
                // Page displayed before a selection
                echo "<h2> Select a Subject or Page to Edit </h2>";
            }
            ?>
            <br />

        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>