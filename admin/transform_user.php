<?php

require_once '../assets/partial/header_admin.php';

$req = $bdd->prepare('UPDATE user SET `admin` = :bool  WHERE `id` = :user_id');
$req = $req->execute(array(':bool' => 0, ':user_id' => htmlentities($_GET['id'])));

header('Location: main_page.php');

?>