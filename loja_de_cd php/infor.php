<?php 
  include "heade.php";
 ?>
<?php 
if(isset($_GET['id_cliente']))$id_cliente = $_GET['id_cliente'];
// include_once 'header.php';
?>
				            <table class="table table-strip">
     <thead>
  <tr>

    <?php include_once "conexao.php";
$sql = "select * from cliente where
           id_cliente ='".$id_cliente."';";
           $result =mysqli_query($con ,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){

?>
<th colspan='4'>lista de itens pedido do : <?php echo $linha['nome']; ?></th>

    <?php 
    }} ?>
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
$sql = "select c.titulo, c.preco, c.por, pi.data ,pi.quantidade , c.promocao from cd as c join pedido_itens as pi on c.id_cd = pi.id_cd where
            pi.id_cliente ='".$id_cliente."' ORDER BY `id_pedido`;";
            echo $sql;
           $result = mysqli_query($con ,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){

?>
<b>
<tbody id="myTable">
      <tr>
          <td><?php echo $linha['titulo'];?></td>

            <?php if ($linha['promocao']==1) {?>
              <td><?php echo number_format($linha['por'], 2, ',', '.')?></td>
              <td><?php echo $linha['quantidade'];?></td>
              <td><?php echo $linha['data'];?></td>
               <?php $sub = $linha['por'] * $linha['quantidade']; ?>
              <td><?php echo number_format($sub, 2, ',', '.'); ?></td>
              </tr>
           <?php }else{?>
           <td><?php echo number_format($linha['preco'], 2, ',', '.')?></td>
              <td><?php echo $linha['quantidade'];?></td>
          <td><?php echo $linha['data'];?></td>
          <?php $sub = $linha['preco'] * $linha['quantidade']; ?>
          <td><?php echo number_format($sub, 2, ',', '.'); ?></td>
          </tr>
           <?php } ?>
          
          <?php $total += $sub; ?>
          
</b>
<?php
          }//fim do while
        }//fim do if  
        
?><th colspan="2">total</th><td colspan="3">R$<?php echo number_format($total, 2, ',', '.'); ?></td>
</tbody>
</table>

<a href="indexadm.php">voltar</a>