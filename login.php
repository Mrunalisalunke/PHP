<?php

include("./includes/session.php");
include("./includes/functions.php");

// Checking if user already logged in, then skip login
if (logged_in()) {
    redirect_to("staff.php");
}


include("./includes/header.php");

if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
}
?>
<table id="structure">
    <tr>
        <td id="navigation">
            &nbsp;
        </td>
        <td id="page">
            <h2>Login to staff</h2>
            <p><?php echo (isset($message) ? $message : ""); ?></p>
            <form action="./controller/login.php" method="post">
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
                <input type="submit" value="Login">
            </form>
        </td>
    </tr>
</table>
<?php include("./includes/footer.php"); ?>