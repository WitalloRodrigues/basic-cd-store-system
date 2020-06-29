<?php 
include("headelog.php");
 ?>
 <style type="text/css">
  	body{
  		margin-top: 10%;
  	}.card{
  		margin-top: 50%;
  	}#thu{
  		margin-left: 40%;
  		margin-top: -600px;
  		position: absolute;
  		border-color: blue; 
  	}
  </style> <a href="index.php">votar</a>
 <?php  
	require_once "functions/product.php";
	$pdoConnection = require_once "connection.php";
	$products = getProducts($pdoConnection);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Carrinho de Compras</title>
	<link rel="stylesheet" href="css/test.css" />


</head>
<body>

	<div class="container">
		<div class="row">
			<?php foreach($products as $product) : ?>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							 
							 <h6 class="card-subtitle mb-2 text-muted">
							 	<h4 class="card-title" > <?php echo "<img src='fotos/".$product['capa']."'width='300' height='300'>";?></h4>
							 </h6>
						</div>
					</div>
				</div>

			<?php endforeach;?>
		</div>
	</div>
	<div class="container" id='thu'>
		<div class="row">
			<?php foreach($products as $product) : ?>
				<div class="col-7">
					<div class="card">
						<div class="card-body">
							 <h2 class="card-title"><?php echo $product['titulo']?></h2>
							 
							 <h6 class="card-subtitle mb-2 text-muted">
							 	<table>
							 		<tr>
							 			<th></th>
							 		</tr>
							 	</table>
							 	<?php if ($product['promocao'] == 1) {
							 		 echo "R$".number_format($product['por'], 2, ',', '.') ." |"; 
							 	}else{
							 		 echo "R$".number_format($product['preco'], 2, ',', '.') ." |";
							 	} ?>

							  	<?php echo $product['nomeGenero']?> |
							  	<?php echo $product['anoLancamento']?> |
							  	<?php echo $product['disponibilidade']." cd's"?> |
							  	<?php echo $product['descricao']?> 
							  	
							 </h6>
							 <br>
							 <center>
							 <a class="btn btn-primary" href="carrinho.php?acao=add&id_cd=<?php echo $product['id_cd']?>" class="card-link" >Comprar</a> | <a href="index.php"  class="btn btn-danger">voltar</a></center>
						</div>
					</div>
				</div>

			<?php endforeach;?>
		</div>
	</div>
	
	
</body>
</html>