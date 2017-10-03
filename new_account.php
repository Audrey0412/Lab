<?php

require_once 'assets/partial/header.php';

if(!empty($_SESSION['user_id'])){
header('Location: home.php');
}

$error_message = '';

if(isset($_POST['username'])){
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error_message = 'One field is compulsory';
    }
    else {
        if (strlen($_POST['password']) < 5) {
        $error_message = 'Password need to be at least 5 characters';
        }
        else {
        $req = $bdd->prepare('SELECT COUNT(*) FROM library.user WHERE username LIKE :username');
        $req->execute(array(':email' => htmlentities($_POST['email'])));

            if ($req->fetchColumn() != 0) {
            $error_message = 'An user already exist with this username';
            }
            else {
            $salt = sprintf("$2a$%02d$", 10) . strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $hash = crypt($_POST['password'], $salt);

            $req = $bdd->prepare('INSERT INTO library.user (username, password) VALUES (:username, :password)');
            $req = $req->execute(array(':username' => htmlentities($_POST['username']), ':password' => $hash));

            // Test to verify if the request is executed
                if ($req) {
                header_remove();
                header("location: login.php");
                }
                else {
                $error_message = 'An unknow error occured';
                }
            }
        }
    }
}

generateHeader('new_account');

?>

    <div>
        <h1 id="title_page">New Account Creation</h1>
    </div>

    <div class="center-class">
        <form action="new_account.php" method="post">

            <?php echo !empty($error_message)?'<p>'.$error_message.'</p>':''; ?>

            <div class="row">
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" />
            </div>

            <div class="row">
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" />
            </div>

            <div class="row">
                <button class="button" type="submit">Register</button>
            </div>
        </form>
    </div>

<?php
require_once 'assets/partial/footer.php';
?>