<?php

require_once 'assets/partial/header.php';

$req = $bdd->prepare('UPDATE book SET `reserved` = :bool  WHERE `id` = :book_id');
$req = $req->execute(array(':bool' => 0, ':book_id' => $_GET['id']));

header('Location: my_books.php')

?>