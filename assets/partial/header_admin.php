<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', 'root');

function generateHeader($cssFile)
{
    ?>

    <!DOCTYPE html>

    <html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/master.css"/>
        <link rel="stylesheet" href="../assets/css/<?php echo $cssFile; ?>.css"/>
        <title>Admin</title>
    </head>

<body>

<header >
    <h1 id="title_page"> Administrator Interface</h1>
</header>

<nav id="nav_main_menu">

    <div>
        <ul>
            <li><a class="uppercase <?php echo $cssFile == 'admin_main_page' ? 'active' : ''; ?>" href = "main_page.php" >Home</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'admin_add_book' ? 'active' : ''; ?>" href = "add_book.php" >Add Book</a></li >
            <li ><a class="uppercase <?php echo $cssFile == 'admin_delete_book' ? 'active' : ''; ?>" href = "book_list.php" >Delete Book</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'admin_gallery' ? 'active' : ''; ?>" href = "gallery.php" >Gallery</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'admin_upload_picture' ? 'active' : ''; ?>" href = "upload_picture.php" >Upload Picture</a ></li >
        </ul >
    </div>
    <div> <a class="uppercase" href="logout.php">Log Out</a> </div>

</nav>

    <?php
}