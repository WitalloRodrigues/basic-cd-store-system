<?php
	include("headelog.php");
	session_start();
	if (isset($_SESSION['adm'])) {
	echo"<script>window.location='indexadm.php'</script>";
}
?>
<html>
<head>
	<title>sistema_de_login</title>
	<style type="text/css">
	body{
		padding-top: 10%;
	}
		</style>
</head>
<body><center>
	<form method='post' action='login.php'>
		Email:
		<input type='text' name='email'><br>
		Senha:
		<input type='text' name='senha'><br><br>
		<input type='submit'>
	</form>
	<a href="cadastrarcliente.php"><input type='submit' value='cadastrar'></a>
	<a href="index.php"><input type='submit' value='voltar'></a>
	</center>
</body>
</html>
<?php
include_once "conexao.php";
if((isset($_POST['email'])==0) and (isset($_POST['senha'])==0)){ 
}else{ 
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql="select * from cliente where email='$email' and senha='$senha'";
$result=mysql_query($sql,$con);
$res=mysql_num_rows($result);
if($res){}else{
	echo "<script>alert('Login ou Senha invalidos')</script>";
}
$get=mysql_query("select * from cliente where email='$email' and senha='$senha'");
$num = mysql_num_rows($get);
if($num == 1){
	while ($percorrer = mysql_fetch_array($get)) {
		$nivel = $percorrer['nivel'];
		$nome = $percorrer['nome'];
		$id = $percorrer['id_cliente'];



		if ($nivel == 1){
			$_SESSION['adm'] = $nome;
			echo "<script> window.location=' indexadm.php'</script>";
		}else{
			$_SESSION['nor'] = $nome;
			$_SESSION['id'] =$id;
			echo "<script> window.location=' index.php'</script>";
		}

		
	}
}
}
?>