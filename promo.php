<?php 
include "conexao.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>



 <?php
 if(isset($_GET['promocao'])){
 	$promocao = $_GET['promocao'];

// pecorrento o banco
 
           include_once "conexao.php";
            $sql = "select * from cd WHERE id_cd ='".$promocao."'";
           $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
      		$desconto = $linha['desconto'];
				}
	}
}
if(isset($_GET['despromocao'])){
 	$despromocao = $_GET['despromocao'];

// pecorrento o banco
 
           include_once "conexao.php";
            $sql = "select * from cd WHERE id_cd ='".$despromocao."'";
			$result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
      		$desconto = $linha['desconto'];
				}
	}
}

 if((isset($_GET['despromocao'])) and (isset($_GET['preco']))){
	$preco = $_GET['preco'];
	$final = $preco ;
 $sql = "UPDATE `cd` SET `promocao` = '0' , por =".$final." WHERE `cd`.`id_cd` = ".$_GET['despromocao'];
 mysqli_query($con,$sql);
}
if((isset($_GET['promocao'])) and (isset($_GET['preco']))){
	$preco = $_GET['preco'];
	$cal = ($preco * $desconto)/100;
	$final = $preco - $cal;
 $sql = "UPDATE `cd` SET `promocao` = '1' , por =".$final." WHERE `cd`.`id_cd` = ".$_GET['promocao'];
 mysqli_query($con,$sql);
}
echo"<script>window.location='indexadm.php'</script>";
?>