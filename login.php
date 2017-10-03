<?php
require_once 'assets/partial/header.php';

if(!empty($_SESSION['user_id'])){
    header('Location: home.php');
}

$error_message = '';

if(isset($_POST['username'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])) {

        $req = $bdd->prepare('SELECT * FROM `library`.`user` WHERE username LIKE :username');

        $req->execute(array(':username' => htmlentities($_POST['username'])));

        $result = $req->fetch();

        if(!empty($result['password']) && hash_equals($result['password'], crypt($_POST['password'], $result['password']))) {

            $_SESSION['user_id'] = $result['id'];
            header('Location: upload_picture.php');
        }
        else{
            $error_message = 'User or Password is incorrect !';
        }
    }
    else{
        $error_message = 'One field is compulsory';
    }
}
generateHeader('login');
?>

<div>
    <h1 id="title_page">Login Page</h1>
</div>

<p class="center-text">If you don't have an account : <a class="link" href="new_account.php"> Go here to create one !</a></p>
<div class="center-class">
    <form action="login.php" method="post">

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

<?php
require_once 'assets/partial/footer.php';
?>
