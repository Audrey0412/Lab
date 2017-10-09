<?php

require_once '../assets/partial/header_admin.php';

$req = $bdd->query('SELECT * FROM library.user');

generateHeader('admin_main_page');
?>

<div class="contener">
    <table>
        <tr class="head">
            <td><p>Username</p></td>
            <td><p>Admin</p></td>
            <td><p>Delete</p></td>
        </tr>
        <?php
        while ($donnees = $req->fetch()) {
            ?>
            <tr>
                <td><p> <?php echo $donnees['username']; ?> </p></td>
                <td><p> <?php if ($donnees['admin'] == 1) { ?> <a class="admin" href="transform_user.php<?php echo '?id=' . $donnees['id'] . ''; ?>">Admin</a> <?php } else { ?><a class="user" href="transform_admin.php<?php echo '?id=' . $donnees['id'] . ''; ?>" >User</a> <?php } ?> </p></td>
                <td><p><a class="trash" href="delete_user.php<?php echo '?id='.$donnees['id'].''; ?>"><span class="fa fa-trash-o"></span></a></p></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

