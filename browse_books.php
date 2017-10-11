<?php
    require_once 'assets/partial/header.php';

if (isset($_POST['search_title']) && isset($_POST['search_author']))  {
    if (!empty($_POST['search_title']) && !empty($_POST['search_author'])) {
        $book = $bdd->prepare('SELECT b.*, a.*, b.id id_book FROM book b, author a, book_author ba WHERE b.id = ba.book_id AND a.id = ba.author_id AND reserved= :bool AND b.name LIKE :search_title AND (a.firstname LIKE :search_author OR a.lastname LIKE :search_author OR a.nationality LIKE :search_author)GROUP BY ba.id');
        $book->execute(array(':bool' => 0, ':search_title' => '%' . $_POST['search_title'] . '%', ':search_author' => '%' . $_POST['search_author'] . '%'));
    }
    else {
        if (!empty($_POST['search_title'])) {
            $book = $bdd->prepare('SELECT b.*, a.*, b.id id_book FROM book b, author a, book_author ba WHERE b.id = ba.book_id AND a.id = ba.author_id AND reserved= :bool AND b.name LIKE :search_title GROUP BY ba.id');
            $book->execute(array(':bool' => 0, ':search_title' => '%' . $_POST['search_title'] . '%'));
        }
        else{
            if (!empty($_POST['search_author'])) {
                $book = $bdd->prepare('SELECT b.*, a.*, b.id id_book FROM book b, author a, book_author ba WHERE b.id = ba.book_id AND a.id = ba.author_id AND reserved= :bool AND (firstname LIKE :search_author OR lastname LIKE :search_author OR nationality LIKE :search_author)GROUP BY ba.id');
                $book->execute(array(':bool' => 0, ':search_author' => '%' . $_POST['search_author'] . '%'));
            }
            else{
                $book = $bdd->prepare('SELECT b.*, a.*, b.id id_book FROM book b, author a, book_author ba WHERE b.id = ba.book_id AND a.id = ba.author_id AND reserved= :bool GROUP BY ba.id');
                $book->execute(array(':bool' => 0));
            }
        }
    }

}
else{
    $book = $bdd->prepare('SELECT b.*, a.*, b.id id_book FROM book b, author a, book_author ba WHERE b.id = ba.book_id AND a.id = ba.author_id AND reserved= :bool GROUP BY ba.id');
    $book->execute(array(':bool' => 0));
}

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
            <label for="search_title">Title :</label>
            <input type="text" name="search_title" id="search_title" />
        </div>

        <div class="row">
            <label for="search_author">Author :</label>
            <input type="text" name="search_author" id="search_author" />
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
            <th>Reserve</th>
        </tr>
        </thead>

        <tbody>
        <?php
        while ($donnees = $book->fetch()){
            ?>
            <td><img src="assets/img/<?php echo $donnees['img'];?>" alt="Picture of Alice" class="book-image" /></td>
            <td> <?php echo $donnees['name']; ?></td>
            <td> <?php echo $donnees['firstname']; ?> <?php echo $donnees['lastname']; ?>, (<?php echo $donnees['nationality']; ?>)</td>
            <td><a href="reserve.php<?php echo '?id='.$donnees['id_book'].''; ?>" class="button">Reserve</a></td>
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

