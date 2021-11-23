<?php
	include '../controller/commentC.php';
	$blogC=new commentC();
	$listComment=$blogC->afficherComment(); 
?>
<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6">

				
		
		<center><h1>Liste des blogs</h1></center>
		<table class="table table-striped">
			<tr>
				
				<th>ID</th>
				<th>Contenu</th>
				<th>id_blog</th>
				
				
				
			</tr>
			<?php
				foreach($listComment as $comments){
			?>
			<tr>
            <td><?php echo $comments['idCommentaire']; ?></td>
				<td><?php echo $comments['contenuC']; ?></td>
                <td><?php echo $comments['id_blog']; ?></td>
				
				
				
				
				
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
