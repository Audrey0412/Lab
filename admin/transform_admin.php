<?php

require_once '../assets/partial/header_admin.php';

$req = $bdd->prepare('UPDATE library.user SET `admin` = :bool  WHERE `id` = :user_id');
$req->execute(array(':bool' => 1, ':user_id' => htmlentities($_GET['id'])));

header('Location: main_page.php');

?>