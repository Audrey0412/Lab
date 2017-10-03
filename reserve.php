<?php
require_once 'assets/partial/header.php';

$req = $bdd->prepare('UPDATE book SET `reserved` = :bool  WHERE `id` = :book_id');
$req = $req->execute(array(':bool' => 1, ':book_id' => htmlentities($_GET['id'])));

header('Location: browse_books.php?reserved=1')

?>