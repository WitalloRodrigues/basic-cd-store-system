<!DOCTYPE html>
<html lang="en">
<head>
<title>LOJA DE CD`S</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
 <?php 

 include 'header.php'; 

 ?>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="POST" action="cadastro.php">
					<span class="login100-form-title p-b-59">
						CADASTO
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Nome</span>
						<input class="input100" type="text" name="nome" placeholder="Nome...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="sobreNome is required">
						<span class="label-input100">SobreNome</span>
						<input class="input100" type="text" name="sobreNome" placeholder="sobreNome...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "telephone is required">
						<span class="label-input100">Telefone</span>
						<input class="input100" type="text" name="telefone" placeholder="telefone...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="cpf is required">
						<span class="label-input100">Cpf</span>
						<input class="input100" type="text" name="cpf" placeholder="cpf...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Senha</span>
						<input class="input100" type="Password" name="senha" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Confirmar senha</span>
						<input class="input100" type="Password" name="repeat-pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Cadastrar
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Já tenho conta
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php 
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y'); 
include_once "conexao.php";
if((isset($_POST['nome'])==0) and (isset($_POST['sobreNome'])==0) and (isset($_POST['email'])==0) and (isset($_POST['telefone'])==0) and (isset($_POST['cpf'])==0) and (isset($_POST['senha'])==0)){ 
}else{
$cadnomeclie = $_POST['nome'];
$cadsobrenomeclie = $_POST['sobreNome'];
$cademailclie = $_POST['email'];
$cadtelefoneclie = $_POST['telefone'];
$cadcpfclie = $_POST['cpf'];
$cadsenhaclie = $_POST['senha'];
$sql="select * from cliente where email='$cademailclie' ";
$result=mysqli_query($con ,$sql);

$res=mysqli_num_rows($result);
if($res){
  echo"<script> alert('Email já cadstrado!')</script>";  
}else{
    $sql="insert into cliente values(0,'".$cadnomeclie."','".$cadsobrenomeclie."','".$cadtelefoneclie."','".$cadcpfclie."','".$cademailclie."','".$cadsenhaclie."','0','".$data."')";
    mysqli_query($con ,$sql);
    echo"<script> alert('Cliente cadastrado com susseso!')</script>";
    echo "<script> window.location=' login.php'</script>"; 
}
}
?>