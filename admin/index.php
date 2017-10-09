<?php

$bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', 'root');

$error_message = '';

if(isset($_POST['username'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $req = $bdd->prepare('SELECT * FROM `library`.`user` WHERE username LIKE :username');

        $req->execute(array(':username' => htmlentities($_POST['username'])));

        $result = $req->fetch();

        if ($result['admin'] == 1) {

            if (!empty($result['password']) && hash_equals($result['password'], crypt($_POST['password'], $result['password']))) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                header('Location: main_page.php');
                die();
            } else {
                $error_message = 'User or Password is incorrect !';
            }
        } else {
            $error_message = 'You are not an admin member';
        }
    }
    else {
            $error_message = 'One field is compulsory';
        }
}

?>

    <!DOCTYPE html>
    
    <html>
        <head>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="../assets/css/master.css"/>
            <link rel="stylesheet" href="../assets/css/admin_index.css"/>
            <title>Admin</title>
        </head>

<div>
    <h1 id="title_page">Administrator Interface</h1>
</div>

<div class="center-class">
    <form action="index.php" method="post">

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
            <button class="button" type="submit">Login</button>
        </div>
    </form>
</div>