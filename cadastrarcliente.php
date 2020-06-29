<?php
	include("headelog.php");
?>
<html>
<head>
	<title>sistema_de_login</title>
	<style type="text/css">
	body{
		padding-top: 10%;
	}
	</style>
</heade>
	<form method='post' action='cadastrarcliente.php'>
		<center>
		nome:
	<input type='text' name='cadnomeclie'><br>
		sobrenome:
	<input type='text' name='cadsobrenomeclie'><br>
		email:
	<input type='text' name='cademailclie'><br>
		telefone:
	<input type='text' name='cadtelefoneclie'><br>
		cpf:
	<input type='text' name='cadcpfclie'><br>
		senha:
	<input type='text' name='cadsenhaclie'><br><br>
	<input type='submit' value='cadastrar'>
	</form>
<a href="login.php">voltar</a>
</center>
<?php 
  date_default_timezone_set('America/Sao_Paulo');
$data = date('dmY'); 
include_once "conexao.php";
if((isset($_POST['cadnomeclie'])==0) and (isset($_POST['cadsobrenomeclie'])==0) and (isset($_POST['cademailclie'])==0) and (isset($_POST['cadtelefoneclie'])==0) and (isset($_POST['cadcpfclie'])==0)  and (isset($_POST['cadloginclie'])==0) and (isset($_POST['cadsenhaclie'])==0)){ 
}else{
$cadnomeclie = $_POST['cadnomeclie'];
$cadsobrenomeclie = $_POST['cadsobrenomeclie'];
$cademailclie = $_POST['cademailclie'];
$cadtelefoneclie = $_POST['cadtelefoneclie'];
$cadcpfclie = $_POST['cadcpfclie'];
$cadsenhaclie = $_POST['cadsenhaclie'];
$sql="select * from cliente where email='$cademailclie' ";
$result=mysqli_query($con,$sql);
$res=mysqli_num_rows($result);
if($res){
  echo"<script> alert('Cliente já cadstrado!')</script>";  
}else{
	echo $res;
    $sql="insert into cliente values(0,'".$cadnomeclie."','".$cadsobrenomeclie."','".$cadtelefoneclie."','".$cadcpfclie."','".$cademailclie."','".$cadsenhaclie."','0','".$data."')";
    mysqli_query($con,$sql);
    echo "<script> window.location=' login.php'</script>";
    echo"<script> alert('Cliente cadastrado com susseso!')</script>";
}
}
?>