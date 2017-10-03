<?php
require_once 'assets/partial/header.php';

if(empty($_SESSION['user_id'])){
    header('Location: home.php');
}

$req = $bdd->prepare('SELECT * FROM library.user WHERE id = :user_id');
$req->execute(array(':user_id' => $_SESSION['user_id']));

$donnees = $req->fetch();

generateHeader('my_account');
?>

    <h1 id="title_page">Hello, <?php echo $donnees['username']; ?></h1>

    <div class="contain">
        <div class="block">
            <a href="logout.php">
                <div><p>Log Out</p></div>
            </a>
        </div>
    </div>

<?php
require_once 'assets/partial/footer.php';
?>