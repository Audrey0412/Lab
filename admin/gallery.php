<?php
require_once '../assets/partial/header_admin.php';

$req = $bdd->query('SELECT * FROM picture');

generateHeader('admin_gallery');
?>

    <div class="contener">
        <div class="pictures">
            <?php
            while ($donnees = $req->fetch()) {
                ?>
                <img src="../assets/img/gallery/<?php echo $donnees['name']; ?>" alt="Picture"/>
                <?php
            }
            ?>
        </div>
    </div>