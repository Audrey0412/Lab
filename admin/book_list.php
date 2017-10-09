<?php
require_once '../assets/partial/header_admin.php';

$req = $bdd->query('SELECT * FROM book');

generateHeader('admin_delete_book');
?>

<div class="table-content">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Delete</th>
            </tr>
        </thead>
    
        <tbody>
        <?php
        while ($donnees = $req->fetch()){
            ?>
            <tr>
            <td><img src="../assets/img/<?php echo $donnees['img'];?>" alt="Picture of Alice" class="book-image" /></td>
            <td> <?php echo $donnees['name']; ?></td>
            <td> <?php echo $donnees['author']; ?></td>
            <td><a class="trash" href="delete_book.php<?php echo '?id='.$donnees['id'].''; ?>"><span class="fa fa-trash-o"></span></a></td>
            </tr>
            <?php
        }
        ?>
</tbody>
</table>
</div>