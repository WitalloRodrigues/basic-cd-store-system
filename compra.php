<?php 
include("heade.php");
if (isset($_SESSION['nor'])==0) {
  echo "<script> window.location=' login.php'</script>";
}
  
 ?>
 <style type="text/css">
    body{
      padding-top: 10%;
    }
  </style>

  <body><center>
    <a href="carrinho.php">voltar</a> 
    
    <table border="1">
    	<thead>
    		<tr>
    			<th>cd</th>
    			<th>preço</th>
    			<th>qtd</th>
    			<th>sub</th>
          
    		</tr>
    	</thead>
    	<tbody>
    		<?php $total = 0; ?>
    		<?php foreach ($_SESSION['dados'] as $key ) { ?>
    		<tr>
    			<td><?php echo $key['name']; ?></td>
    			<td><?php echo $key['price']; ?></td>
    			<td><?php echo $key['quantity']; ?></td>
    			<td><?php echo $key['subtotal']; ?></td>
    			<?php $total +=$key['subtotal'] ?>
          
    		</tr>

    	</tbody>
    	<?php } ?>
    	<tr><th colspan="2" >total</th><td colspan="2" align="center"><?php echo $total; ?></td></tr>
    </table>
</center>
<form method="post" action="compra.php?tets=true">
<center>
	<table border="1">
		<tr>
			<td colspan="2" align="center">Endreço(cep):</td>
		</tr>
		<tr>
			<td ><input type="text" name="end"> </td><td  align="center"><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm">pesquisar</a></td>
		</tr>
		<tr>
			<td>Forma de pagamento:</td><td  align="center">
				<select name="fp">
          <option value="a vista">a vista</option>
          <option value="prazo">prazo</option>
				
			</select></td>
		</tr>
		<tr><td>Tipo de pagamento:</td><td  align="center">
        <select name="tp">
          <option value="cartao">cartao</option>
        <option value="boleto"> boleto</option>
      </select></td>
		</tr>
		<tr>
			<td>Opçao de envio:</td><td  align="center">
        <select name="oe">
          <option value="aerio">aerio</option>
          <option value="marinho">maritimo</option>
      </select>
    </td>
		</tr>
    

	</table><br><br>
<input type="submit" value="enviar">
</center>	



</form>


</body>

    <?php 
include 'conexao.php';
if (isset($_SESSION['id'])) {
  $id_cliente = $_SESSION['id'];
} 
if (isset($_POST['boleto'])) {
  $boleto = $_POST['boleto'];
} 
if (isset($_GET['tets'])) {
	 $tets = $_GET['tets'];
}
if (isset($tets)) {
$sql ="INSERT INTO `pedido` (`id_pedido`, `id_cliente`,`total`) VALUES (NULL,'".$id_cliente."','".$total."')";
mysqli_query($con,$sql);

   if (isset($_SESSION['dados'])) {
  $test = $_SESSION['dados'];
    foreach ($test as $key) {
        $sql = "select * from cd where id_cd = '".$key['id_cd']."'";
                            $result = mysqli_query($con,$sql);
                            if($result){
                            while($linha = mysqli_fetch_array($result)){
                                $estoque = $linha['disponibilidade'];
                                $venda =$linha['venda'];
                            }
                        }
                        $qtd = $key['quantity'];
                        $dim = $estoque - $qtd ;
                        $alm = $venda + $qtd;
 $sql = "update cd set disponibilidade='".$dim."' where id_cd=".$key['id_cd'];
                      mysqli_query($con,$sql);  
$sql = "update cd set venda='".$alm."' where id_cd=".$key['id_cd'];
                      mysqli_query($con,$sql); 
     }//fim do foreach
     }//fim do issert 
     if (isset($_POST['tp'])) {
   $tp = $_POST['tp'];
}
     if ($tp == "cartao") {
       $aonde = "finalizaCompra";
     }else{
      $aonde = "boleto_bb";
     }
               echo"<script>window.location='eventoCompra.php?boleto=".$aonde."'</script>";    
                    
     }//fim do if $test;
?>
