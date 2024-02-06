<?php require_once("./includes/connection.php") ?>
<?php require_once("./includes/functions.php") ?>
<?php
if (intval($_GET['subj']) == 0) {
    redirect_to('content.php');
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
                Add Page in <?php echo $sel_subject['menu_name'] ?>
            </h2>
            <form action="./controller/create_page.php?subj=<?php echo urlencode($sel_subject['id']); ?>" method="post">
                <p>Page name:
                    <input type="text" name="menu_name" id="menu_name" placeholder="Enter page name" />
                </p>
                <p>Position:
                    <select name="position" id="position">
                        <?php
                        $pagess = get_pages_for_subject($sel_subject['id']);
                        $pages_count = $pagess->num_rows;
                        for ($i = 1; $i <= $pages_count + 1; $i++) {
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
                <label for="content">
                    Content:
                </label>
                <p>
                    <textarea name="content" id="content" cols="100" rows="20" placeholder="Enter Page content here!"></textarea>
                </p>
                <input type="submit" value="Add Pages">
            </form>
            <br />
            <a href="content.php">Cancel</a>
        </td>
    </tr>
</table>
<?php require("./includes/footer.php"); ?>