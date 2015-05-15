<?php
session_start();

require_once dirname(__FILE__) . '/../controllers/cusers.php';
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}
elseif (filter_input(INPUT_POST, 'user') && filter_input(INPUT_POST, 'pass')) {
    $cu = new Cusers();
    $res = $cu->is_avtorized(filter_input(INPUT_POST, 'user'), filter_input(INPUT_POST, 'pass'));
    if ($res) {
        $_SESSION['login'] = filter_input(INPUT_POST, 'user');
        header('Location: index.php');
        session_write_close();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/adminka.css">
        <title>Log in</title>
    </head>
    <body>
        <div class="hide">
            <div id='fg_membersite'>
                <div id="Sign-In">
                    <fieldset><legend>LOG-IN HERE</legend>
                        <form  method="POST">
                            <label>Login</label> <br><input type="text" name="user" size="40"><br>
                            <label>Password</label> <br><input type="password" name="pass" size="40"><br>
                            <button class="button" type="submit" name="submit" >Log-In</button>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
