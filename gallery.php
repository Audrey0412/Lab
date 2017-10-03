<?php
require_once 'assets/partial/header.php';

$req = $bdd->query('SELECT * FROM picture');

generateHeader('gallery');
?>

    <div>
        <h1 id="title_page">Gallery Page</h1>
        <div class="pictures">
            <?php
            while ($donnees = $req->fetch()) {
                ?>
                <img src="assets/img/gallery/<?php echo $donnees['name']; ?>" alt="Picture"/>
                <?php
            }
                ?>
        </div>
    </div>

<?php
require_once 'assets/partial/footer.php';
?>