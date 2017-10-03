<?php
    require_once 'assets/partial/header.php';


$book = $bdd->prepare('SELECT * FROM book WHERE reserved= :bool');
$book->execute(array(':bool' => 0));

generateHeader('browse_books');
?>

<div>
    <h1 id="title_page">Browse Books Page</h1>
</div>

<div>
    <p>To search the book of your dreams enter the Author and the Title and click on Search. If the book you want is not here you can make us a description on our <a id="link" href="contact.php">contact</a> page.</p>
</div>

<div class="center-class">
    <form action="browse_books.php" method="post">
        <div class="row">
            <label for="title">Title :</label>
            <input type="text" name="title" id="title" />
        </div>

        <div class="row">
            <label for="author">Author :</label>
            <input type="text" name="author" id="author" />
        </div>

        <div class="row">
            <button class="button" type="submit">Search</button>
        </div>
    </form>

</div>

<div class ="center-class">
    <?php
    if (isset($_GET['reserved']) && $_GET['reserved'] == 1) {
        ?>
        <p>The book has been reserved</p>
        <?php
    }
    ?>
</div>


<div class="center-class">


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
            <td><a href="reserve.php<?php echo '?id='.$donnees['id'].''; ?>" class="button">Reserve</a></td>
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

