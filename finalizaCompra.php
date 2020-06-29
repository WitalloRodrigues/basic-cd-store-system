<?php 
include("heade.php");
if (isset($_SESSION['nor'])==0) {
  echo "<script> window.location=' login.php'</script>";
}if (isset($_SESSION['pedido'])) {
  $pedido = $_SESSION['pedido'];
}
 ?>
 <style type="text/css">
    body{
      margin-top: 10%;
    }
  </style>

  <body >
<?php if (isset($_SESSION['id'])) {
  $id_cliente = $_SESSION['id'];
} ?>
                    <table class="table table-strip">
     <thead>
  <tr>
    <th colspan='5'>lista de itens do cliente : <?php echo $_SESSION['nor']; ?></th>
  </tr>
<tr>
  <th>cd</th>
  <th>preço</th>
  <th>qtd</th>

  <th>data</th>
  <th>subt.</th>
  
</tr>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:#fff;};

 
</style>
<center>
      <?php
      $total = 0;
           include_once "conexao.php";
           $sql = "select c.titulo, c.preco, pi.data ,pi.quantidade from cd as c join pedido_itens as pi on c.id_cd = pi.id_cd where
            pi.id_pedido ='".$pedido."' ORDER BY `id_pedido`;";
           $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?>
<b>
<tbody id="myTable">

       <tr>
          <td><?php echo $linha['titulo'];?></td>
          <td><?php echo number_format($linha['preco'], 2, ',', '.')?></td>
          <td><?php echo $linha['quantidade'];?></td>
          <td><?php echo $linha['data'];?></td>
          <?php $sub = $linha['preco'] * $linha['quantidade']; ?>
          <td><?php echo number_format($sub, 2, ',', '.'); ?></td>
          </tr><?php $total += $sub; ?>
          
</tbody>
</b>
<?php
          }//fim do while
        }//fim do if   
?><tr>
            <td colspan="3" align="center">total </td><td colspan="2">R$<?php echo number_format($total, 2, ',', '.'); ?>
            </td>
          </tr>
        </table>
      </center>
      <?php 
      //para eesvaziar o carrinho no final d compra !
      if(isset($_SESSION['carrinho']))
           {
              unset($_SESSION['carrinho']); 
           } 
 ?>
 <input type="button" value="inprimir" onclick="window.print()"/>
<a href="index.php">voltar</a>