<?php
    require_once 'assets/partial/header.php';
    generateHeader('contact');
?>

<div>
    <h1 id="title_page">Contact Page</h1>
</div>

<div class="center-class">
    <form action="send_email.php" method="post">
        <div class="row">
            <label for="mail">E-mail :</label>
            <input type="email" id="mail" name="mail" />
        </div>
    
        <div class="row">
            <label for="object">Object :</label>
            <input type="text" id="object" name="object" />
        </div>
    
        <div class="row">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
        </div>
    
        <div class="row">
            <button class="button" type="submit">Send your message</button>
        </div>
    </form>
</div>

<?php
    require_once 'assets/partial/footer.php';
?>