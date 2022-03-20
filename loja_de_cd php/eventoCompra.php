<?php 
session_start();
if (isset($_SESSION['nor'])==0) {
  echo "<script> window.location=' login.php'</script>";
}
 ?>

  <body >
<?php if (isset($_SESSION['id'])) {
  $id_cliente = $_SESSION['id'];
  
} ?>
 <?php
           include_once "conexao.php";
            $sql = "select * from pedido where id_cliente =".$id_cliente;
           $result = mysqli_query($con ,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?><?php $num =  $linha['id_pedido'];
$_SESSION['pedido'] = $num ;?>
<?php }} ?>

<?php 
  date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y | H:i:s'); ?>

  
<?php 
 if (isset($_SESSION['dados'])) {
  $test = $_SESSION['dados'];
    foreach ($test as $key) {
$sql="INSERT INTO `pedido_itens` (`id_pedido`, `id_cliente`, `id_cd`, `quantidade`, `data` ,  `promocao`) VALUES ('".$num."','".$id_cliente."','".$key['id_cd']."','".$key['quantity']."','".$date."','".$key['promocao']."')";
echo $sql;
mysqli_query($con ,$sql);
    }
}  
    echo"<script> alert('comprado com sucesso')</script>";   
    if (isset($_GET['boleto'])) {
  $boleto = $_GET['boleto'];
}  
    echo"<script>window.location='".$boleto.".php'</script>";
?>