<?php 
include_once'conexao.php';
 if(isset($_POST['nome']))$nome = $_POST['nome'];
 if(isset($_POST['sobreNome']))$sobreNome = $_POST['sobreNome'];
 if(isset($_POST['email']))$email = $_POST['email'];
 if(isset($_POST['cpf']))$cpf = $_POST['cpf'];
  if(isset($_POST['telefone']))$telefone = $_POST['telefone'];
 if(isset($_POST['login']))$login = $_POST['login'];
  if(isset($_POST['senha']))$senha = $_POST['senha'];
  if(isset($_POST['genero']))$genero = $_POST['genero'];
 
if(isset($_GET['editar'])){
 $sql = "update cliente set nome= '".$nome."',sobreNome='".$sobreNome."',email='".$email."',cpf='".$cpf."',telefone='".$telefone."',senha='".$senha."'  where id_cliente=".$_GET['editar'];
 mysqli_query($con,$sql);
 echo"<script> alert('dados atualizado com sucesso')</script>";
  echo"<script>window.location='index.php'</script>";
 }
 if(isset($_GET['cadastrar'])){
	$sql=mysqli_query($con,"insert into genero (nomeGenero) values('".$genero."')");
	mysqli_query($con,$sql);
	echo"<script>window.location='indexadm.php'</script>";
 echo"<script> alert('cd cadastrado com sucesso')</script>";
 } if(isset($_GET['editarGenero'])){
	$sql = "update genero set nomeGenero='".$genero."'  where id_genero=".$_GET['editarGenero'];
	mysqli_query($con,$sql);
	echo"<script> alert('cd atualizado com sucesso')</script>";
			          echo"<script>window.location='indexadm.php'</script>";
 }
 if(isset($_GET['deletar'])){
 	$sql="delete from genero where id_genero = ".$_GET['deletar'];
	 mysqli_query($con,$sql);
	 echo "<script>alert('genero deletado com sucesso!')</script>";
 echo"<script>window.location='indexadm.php'</script>";
 }
 if(isset($_GET['editaradm'])){
 $sql = "update cliente set nome= '".$nome."',sobreNome='".$sobreNome."',email='".$email."',cpf='".$cpf."',telefone='".$telefone."',senha='".$senha."'  where id_cliente=".$_GET['editaradm'];
 mysqli_query($con,$sql);
 echo"<script> alert('dados do cliente atualizado com sucesso')</script>";
  echo"<script>window.location='indexadm.php'</script>";
 }
 ?>