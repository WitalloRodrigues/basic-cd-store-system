<?php 

 include 'header.php'; 

 ?><!DOCTYPE html>

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<html>
<head>

	
</head>
<body>
<?php
    include_once 'conexao.php';
    $sql='select * from cliente where id_cliente='.$_GET['editar'];
    $result=mysqli_query($con ,$sql);
    $linha=mysqli_fetch_array($result);
 echo "<form action= 'evento.php?editar=".$linha['id_cliente']."'method='post'>";?><center>
 	<div id="tabela">
			<table border="5">
				<tr>
				<td align="left"><label>nome:</label></td><td><input type="text"  name="nome" value="<?php echo $linha['nome'];?>" required ><br></td>
				</tr>
				<tr>
					<td>sobrenome:</td><td><input type='text' name='sobreNome' value="<?php echo $linha['sobreNome'];?>" required ></td>
				</tr>
				<tr>
					<td>email:</td><td><input type='text' name='email' value="<?php echo $linha['email'];?>" required ><br></td>
				</tr>
				<tr>
					<td>cpf:</td><td><input type='text' name='cpf' value="<?php echo $linha['cpf'];?>" required ></td>
				</tr>
				<tr>
					<td></td><td></td>
				</tr>
				<tr>
					<td>telefone:</td><td><input type='text' name='telefone' value="<?php echo $linha['telefone'];?>" required ></td>
				</tr>
				<tr>
					<td>senha:</td><td><input type='text' name='senha'  value="<?php echo $linha['senha'];?>" required ><br></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type='submit' value='editar' class="btn "></td>
				</tr>
			</table>
		</div>
</form><br>
<a href="index.php">voltar</a>
</center>
</body>
</html>