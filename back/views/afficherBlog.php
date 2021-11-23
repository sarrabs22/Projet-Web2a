<?php
	include '../controller/blogController.php';
	$blogC=new blogController();
	$listeblog=$blogC->afficherBlogs(); 
?>
<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6">

				<a class="btn btn-success" href="ajouterBlog.php">Ajouter un Blog</a>
		
		<center><h1>Liste des blogs</h1></center>
		<table class="table table-striped">
			<tr>
				<th>id blog</th>
				<th>objet</th>
				<th>date</th>
				<th>image</th>
				<th>description</th>
				<th>modifier</th>
				<th>supprimer</th>
				
			</tr>
			<?php
				foreach($listeblog as $blog){
			?>
			<tr>
				<td><?php echo $blog['id_blog']; ?></td>
				<td><?php echo $blog['objet']; ?></td>
				<td><?php echo $blog['date']; ?></td>
				<td><img src="<?php echo $blog['image']; ?>" alt="" width="50"></td>
				<td><?php echo $blog['description']; ?></td>
				
				
				<td>
					<form method="POST" action="modifierBlog.php">
						<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $blog['id_blog']; ?> name="id_blog">
					</form>
				</td>
				<td>
					<a class="btn btn-danger" href="supprimerBlog.php?id_blog=<?php echo $blog['id_blog']; ?>">Supprimer</a>
					
					
				</td>
			</tr>
			<?php
				}
			?>
		</table>


				</div>
			</div>
		

		</div>
	    

		
	</body>
</html>
