<?php
require_once '../assets/partial/header_admin.php';

//To add a new book
if(isset($_POST['name'])) {
    if (empty($_POST['name']) || empty($_POST['author'])) {
        $errorMsg = "One field is compulsory";
    } else {
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
                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg")
                    $errorMsg = 'Sorry, only JPG, JPEG, PNG files are allowed !';
                else {
                    //Check if one image doesn't already exist with this extension
                    $path = '../assets/img/';
                    $name = '';
                    do {
                        $name = time() . rand(0, 100) . '.' . $extension;
                    } while (file_exists($path . $name));

                    //We try to move the image, if it doesn't work we show an error
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path . $name)) {

                        $add = $bdd->prepare('INSERT INTO `book` (name, author, img) VALUES (:name, :author, :img)');
                        $add = $add->execute(array(':name' => htmlentities($_POST['name']), ':author' => htmlentities($_POST['author']), ':img' => $name));

                        if ($add) {
                            $errorMsg = 'Your product has been added';
                        } else {
                            $errorMsg = 'An unknow error occured';
                        }
                    } else {
                        $errorMsg = 'An unknow error occured while uploading the file';
                    }
                }

            }

        }

    }
}

generateHeader('admin_add_book');
?>

<div class="center-class">
    <form action="add_book.php" method="post" enctype="multipart/form-data">

        <?php echo !empty($errorMsg)?'<p>'.$errorMsg.'</p>':''; ?>

        <div class="row">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" />
        </div>

        <div class="row">
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" />
        </div>

        <div class="row">
            <label for="author">Author :</label>
            <input type="text" id="author" name="author" />
        </div>

        <div class="row">
            <button class="button" type="submit">Add</button>
        </div>
    </form>
</div>