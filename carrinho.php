
<?php 

	session_start();
	require_once "functions/product.php";
	require_once "functions/cart.php";

	$pdoConnection = require_once "connection.php";

	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
		
		if($_GET['acao'] == 'add' && isset($_GET['id_cd']) && preg_match("/^[0-9]+$/", $_GET['id_cd'])){ 
			addCart($_GET['id_cd'], 1);			
		}

		if($_GET['acao'] == 'del' && isset($_GET['id_cd']) && preg_match("/^[0-9]+$/", $_GET['id_cd'])){ 
			deleteCart($_GET['id_cd']);
		}

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id_cd => $qtd){
						updateCart($id_cd, $qtd);
				}
			}
		} 
		header('location: carrinho.php');
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>carrinho</title>
	<link rel="stylesheet" href="css/test.css" />

</head>
<body>
	<div class="container">
		<div class="card mt-5">
			 <div class="card-body">
	    		<h4 class="card-title">Carrinho</h4>
	    		<a href="index.php">Lista de produto</a>
	    	</div>
		</div>

		<?php if($resultsCarts) : ?>
			<form action="carrinho.php?acao=up" method="post">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
					<?php $x=0; ?>
				  <?php foreach($resultsCarts as $result) : ?>
					<tr>
						
						<td><?php echo $result['name']?></td>
						<td>
							<input type="number" max="<?php echo $result['disponibilidade'] ?>" min="0" name="prod[<?php echo $result['id_cd']?>]" value="<?php echo $result['quantity']?>" size="1" />			
							</td>
							<?php if ($result['promocao'] == 0){?>
								<td>R$ <?php echo $result['price']?></td>
								<td>R$ <?php echo $result['subtotal']?></td>
								<?php $tot = $result['subtotal']; ?>
								<?php $x +=$tot ; ?>
								
							<?php }else{?>
								<td>R$ <?php echo $result['preco']?></td>
								<td>R$ <?php echo $result['subcon']?></td>
								<?php $tot = $result['subcon']; ?>
								<?php $x +=$tot ; ?>
							 <?php } ?>
						
						
						<td><a href="carrinho.php?acao=del&id_cd=<?php echo $result['id_cd']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
				 	<td>R$<?php echo number_format($x, 2, ',', '.')?></td>
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>

			<a class="btn btn-info" href="index.php">Continuar Comprando</a>
			<button class="btn btn-primary" type="submit">Atualizar Carrinho</button>
			<a class="btn btn-info" href="compra.php">Compra</a>

			
			<?php 
			 $_SESSION['dados'] = $resultsCarts ;
			 ?>
			</form>
	<?php endif?> 
	<?php if (!$_SESSION['carrinho']) {
		echo "<center>";
		echo "<h1>carrinho vazio</h1>";
		echo "</center>";
		echo "<script>alert('carrinho vazio!')</script>";
	} ?>