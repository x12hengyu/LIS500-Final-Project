<html>
    <head>
        <?php
            /*store the sent information in variables*/
            $firstname = $_POST['name'];
            $lastname = $_POST['surname'];
            $email = $_POST['email'];
            $field = $_POST['field'];
            $message = $_POST['message'];

            $title="The Geek out of $firstname $lastname ";
            echo "<title>$title</title>";?>
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"/>
    </head> 
    <body>
        <div class="container">
            <?php echo "<h1> Welcome to $title </h1>";?><br/>
            <p>
                <?php echo "$firstname is interested to $field";?><br/>
                <?php echo "Here are what $firstname interested to geek out:";?><br/>
                <?php echo "$message";?><br/>
                <?php echo "This is an image about $firstname's geekery:";?><br/>
            </p>
            <!--handle image upload-->
            <?php
            $target_dir = "uploads/";
            if(!is_dir($target_dir)) {
                mkdir($target_dir);
            }
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<img src=\"$target_file\">";
            } else {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                echo "<img src=\"$target_file\">";
            }
            // display the image
            if ($_FILES['fileToUpload']['error'] == 1) {
                echo "!!!Error!!!<br>";
                echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            }
            ?>
        </div>
    </body>
</html>