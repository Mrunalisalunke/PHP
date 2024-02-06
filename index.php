<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
<?php get_selected_page(true); ?>
<?php include("./includes/header.php") ?>

<table id="structure">
    <tr>
        <td id="navigation">
            <?php echo public_navigation($sel_subject, $sel_page); ?>
        </td>
        <td id="page">
            <!-- Page displayed after a selection -->
            <?php
            // if (isset($sel_subject['menu_name'])) {
            //     echo "<h2>" . $sel_subject['menu_name'] . "</h2>";
            // }
            if (isset($sel_page['menu_name'])) {
                echo "<h2>" . $sel_page['menu_name'] . "</h2>";
                echo "<div class='page-content'>";
                echo  nl2br($sel_page['content']);
                echo "</div>";
                echo "<br /><br />";
            } else {
                // Page displayed before a selection
                echo "<h2> Welcome to Widget Corp </h2>";
            }
            ?>
            <br />

        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>