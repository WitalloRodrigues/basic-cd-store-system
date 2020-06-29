<?php 
if(isset($_GET['id_cliente']))$id_cliente = $_GET['id_cliente'];
?>
				            <table class="table table-strip">
     <thead>
  <tr>


  	<th colspan='4'>lista de itens pedido</th>
    <th> <?php echo "<a href=muda.php?editar=".$id_cliente."> altera dados </a>" ?></th>
  </tr>
<th>cd</th>
  <th>preço</th>
  <th>qtd</th>

  <th>data</th>
  <th>subt.</th>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:#fff;};

 
</style>
<center>
  <?php $total = 0; ?>
      <?php
           include_once "conexao.php";
            $sql = "select c.titulo, c.preco, pi.data ,pi.quantidade from cd as c join pedido_itens as pi on c.id_cd = pi.id_cd where
            pi.id_cliente ='".$id_cliente."';";
           $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){

?>
<b>
<tbody id="myTable">
       <tr>
          <td><p> <?php echo $linha['titulo'];?></p></td>
          <td><p> <?php echo number_format($linha['preco'], 2, ',', '.')?></p></td>
          <td><p> <?php echo $linha['quantidade'];?></p></td>
          <td><p> <?php echo $linha['data'];?></p></td>
          <?php $sub = $linha['preco'] * $linha['quantidade']; ?>
          <td><?php echo number_format($sub, 2, ',', '.'); ?></td>
          </tr>
          <?php $total += $sub ?>

</b>
<?php
          }//fim do while
        }//fim do if  
        
?><th colspan="2">total</th><td colspan="3">R$<?php echo number_format($total, 2, ',', '.'); ?></td>
</tbody>
</table>

<a href="indexadm.php">voltar</a>