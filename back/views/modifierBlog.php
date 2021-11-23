<?php
     require_once '../model/Blog.php';
    include_once '../controller/blogController.php';

    $error = "";

    // create blog
    $blogg = null;

    // create an instance of the controller
    $blogC = new blogController();
    if (
        isset($_POST["id_blog"]) &&
		isset($_POST["objet"]) &&		
        isset($_POST["date"]) &&
		isset($_POST["description"]) 
    ) {
        if (
            !empty($_POST["id_blog"]) && 
			!empty($_POST['objet']) &&
            !empty($_POST["date"]) && 
			!empty($_POST["description"])
        ) {
            $Blog = new BlogM(
                $_POST['id_blog'],
				$_POST['objet'],
                $_POST['date'], 
				$_POST['description'],
                
            );
            $blogC->modifierblog($Blog, $_POST["id_blog"]);
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
        <button><a href="afficherBlog.php">Retour à la liste des blogs</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id_blog'])){
				$blog = $blogC->recupererblog($_POST['id_blog']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_blog">Numéro blog:
                        </label>
                    </td>
                    <td><input type="text" name="id_blog" id="id_blog" value="<?php echo $blog['id_blog']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="objet">objet:
                        </label>
                    </td>
                    <td><input type="text" name="objet" id="objet" value="<?php echo $blog['objet']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td><input type="text" name="date" id="date" value="<?php echo $blog['date']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description" value="<?php echo $blog['description']; ?>" id="description">
                    </td>
                </tr>
                          
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>