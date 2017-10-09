<?php

require_once '../assets/partial/header_admin.php';

$req = $bdd->prepare('DELETE FROM book WHERE `id`= :id');
$rep = $req->execute(array('id' => $_GET['id']));

header("Location: book_list.php");

?>
