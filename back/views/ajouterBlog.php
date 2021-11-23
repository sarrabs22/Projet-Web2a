<?php
    require_once '../model/Blog.php';
    include_once '../controller/blogController.php';

    $error = "";

    // create adherent
    $blogg = null;

    // create an instance of the controller
    $BlogC = new blogController();
    if (
        
		isset($_POST["objet"]) &&		
        isset($_POST["date"]) &&
		isset($_POST["description"]) 
        
    ) {
        if (
            
			!empty($_POST['objet']) &&
            !empty($_POST["date"]) && 
			!empty($_POST["description"])  
       
        ) {

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["Image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            if(isset($_POST["upload"])) {
            $check = getimagesize($_FILES["Image"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
            if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
            if ($_FILES["Image"]["size"] > 500000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
           // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
            } else {
             //   echo "Sorry, there was an error uploading your file.";
            }
        }
            $Blog = new BlogM(
                
				$_POST['objet'],
                $_POST['date'], 
				$_POST['description'],
                $target_file
                
              
            );


        

        
            $BlogC->ajouterblog($Blog);

            // Count total files
  

            
            header('Location:afficherBlog.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherBlog.php">Retour à la liste des blog</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="ajouterBlog.php" method="POST" enctype="multipart/form-data">
            <table border="1" align="center">
				<tr>
                    <td>
                        <label for="objet">Objet:
                        </label>
                    </td>
                    <td><input type="text" name="objet" id="objet" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description" id="description">
                    </td>

                    <td>
					<label>Upload here</label>
					<input type="file" name="Image" id="Image" />
                        </td>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" name="upload"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
                
            </table>
        </form>
    </body>
</html>