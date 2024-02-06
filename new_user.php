<?php include("./includes/header.php");

if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
}
?>
<table id="structure">
    <tr>
        <td id="navigation">
            <a href="staff.php">Return to Menu</a>
        </td>
        <td id="page">
            <h2>Create New User</h2>
            <p><?php echo (isset($message) ? $message : ""); ?></p>
            <form action="./controller/create_user.php" method="post">
                <p>
                    <label for="username">
                        Enter Username:
                    </label>
                    <input type="text" name="username">
                </p>
                <p>
                    <label for="username">
                        Enter Password:
                    </label>
                    <input type="password" name="password">
                </p>
                <input type="submit" value="Create User">
            </form>
        </td>
    </tr>
</table>
<?php include("./includes/footer.php"); ?>