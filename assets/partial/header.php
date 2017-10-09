<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', 'root');

if (empty($_SESSION['ip']) || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
    $_SESSION['ip'] = '';
    $_SESSION['user_id'] = '';
    $_SESSION['mail'] = '';
    setcookie('user_id', '', 0, '/');
}

function generateHeader($cssFile)
{

    ?>

    <!DOCTYPE html>

    <html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/master.css"/>
        <link rel="stylesheet" href="assets/css/<?php echo $cssFile; ?>.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <title>Home</title>
    </head>

    <body>
    <nav id="nav_main_menu">
        <?php
        if (!empty($_SESSION['user_id'])) {
            ?>
            <div> <a class="uppercase" href="my_account.php">Account</a> </div>
            <?php
        }
        else{
            ?>
            <div> <a class="uppercase" href="login.php">Login</a> </div>
            <?php
        }
        ?>
        <div>
        <ul>
            <li><a class="uppercase <?php echo $cssFile == 'home' ? 'active' : ''; ?>" href = "home.php" >Home</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'about_us' ? 'active' : ''; ?>" href = "about_us.php" >About Us</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'browse_books' ? 'active' : ''; ?>" href = "browse_books.php" >Browse Books</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'gallery' ? 'active' : ''; ?>" href = "gallery.php" >Gallery</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'my_books' ? 'active' : ''; ?>" href = "my_books.php" >My Books</a ></li >
            <li ><a class="uppercase <?php echo $cssFile == 'contact' ? 'active' : ''; ?>" href = "contact.php" >Contact</a ></li >
        </ul >
        </div>

    </nav>

    <header >
        <h1 id = "title_blink" > Audrey's Library</h1>
        <div id="header_image"></div>
    </header>

    <?php
}
?>