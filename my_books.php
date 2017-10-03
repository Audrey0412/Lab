<?php
    require_once 'assets/partial/header.php';

$book = $bdd->prepare('SELECT * FROM book WHERE reserved= :bool');
$book->execute(array(':bool' => 1));

generateHeader('my_books');
?>
<div>
    <h1 id="title_page">My Books Page</h1>
</div>
<div class="table-content">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
        <?php
        while ($donnees = $book->fetch()){
            ?>
            <td><img src="assets/img/<?php echo $donnees['img'];?>" alt="Picture of Alice" class="book-image" /></td>
                <td> <?php echo $donnees['name']; ?></td>
                <td> <?php echo $donnees['author']; ?></td>
                <td><a href="return.php<?php echo '?id='.$donnees['id'].''; ?>" class="button">Return</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<?php
    require_once 'assets/partial/footer.php';
?>