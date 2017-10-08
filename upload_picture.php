<?php
require_once 'assets/partial/header.php';

if(empty($_SESSION['user_id'])){
    header('Location: home.php');
    die();
}

if(isset($_FILES['image'])) {
//Check if it's an image
    if (getimagesize($_FILES["image"]["tmp_name"]) == false) {
        $errorMsg = 'You must add an image';
    } else {
        //Check the size if the image
        if ($_FILES["image"]["size"] > 500000) {
            $errorMsg = 'Your image is too large !';
        } else {
            // Check the extension of the image
            $extension = pathinfo($_FILES["image"]["name"])['extension'];
            if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
                $errorMsg = 'Sorry, only JPG, JPEG, PNG files are allowed !';
            } else {
                //Check if one image doesn't already exist with this extension
                $path = 'assets/img/gallery/';
                $name = '';
                do {
                    $name = time() . rand(0, 100) . '.' . $extension;
                } while (file_exists($path . $name));

                //We try to move the image, if it doesn't work we show an error
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $path . $name)) {

                    $add_image = $bdd->prepare('INSERT INTO `picture` (name, id_user) VALUES (:name, :id_user)');
                    $add_image = $add_image->execute(array(':name' => $name, ':id_user' => $_SESSION['user_id']));

                    if ($add_image) {
                        header('Location: gallery.php');
                    } else {
                        $errorMsg = 'An unknow error occured';
                    }
                }
            }
        }
    }
}

generateHeader('upload_picture');
?>

    <div>
        <h1 id="title_page">Upload Picture Page</h1>
    </div>

    <div class="center-class">
        <form action="upload_picture.php" method="post" enctype="multipart/form-data">

            <?php echo !empty($errorMsg)?'<p>'.$errorMsg.'</p>':''; ?>

            <div class="row">
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" />
            </div>
            <div class="row">
                <button class="button" type="submit">Add</button>
            </div>
        </form>
    </div>




<?php
require_once 'assets/partial/footer.php';
?>