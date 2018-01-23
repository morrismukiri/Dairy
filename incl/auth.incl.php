<div class="hero-unit">
    <?php
//include 'inc.functions.php';
$msg = (isset($_GET['msg']) ? $_GET['msg'] : '');

if (isset($_POST['user']) && isset($_POST['pass'])) {
    if (isset($login[$_POST['user']]) && ($login[$_POST['user']] == $_POST['pass'])) {
        $_SESSION['user_logged_in'] = true;
        header('Location: index.php?msg=Logged in.');
        exit;
    } else {
        unset($_SESSION['user_logged_in']);
        $msg = 'Sorry, wrong user id or password.';
    }
}

//print_header('Login');

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['user_logged_in']);
    session_destroy();
}

if (strlen($msg) > 0)
    echo "<p id=\"msg\">$msg</p>";

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    ?>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <p>You need to log in to edit this database.</p>
        <ul>
            <li style="list-style: none"><label>User: </label><input type="text" name="user" /></li>
            <li style="list-style: none"><label>Pass: </label><input type="password" name="pass" /></li>
        </ul>
        <p><input type="submit" value="Login" /></p>
    </form>
    <?php 
    exit();
}
?>
</div>