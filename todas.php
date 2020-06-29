<?php 
include("heade.php");
if (isset($_SESSION['nor'])==0) {
  echo "<script> window.location=' login.php'</script>";
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
    <th colspan='5'>lista de itens comprado do cliente : <?php echo $_SESSION['nor']; ?></th>
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
           include_once "conexao.php";
           $sql = "select c.titulo, c.preco, pi.data ,pi.quantidade from cd as c join pedido_itens as pi on c.id_cd = pi.id_cd where
            pi.id_cliente ='".$id_cliente."' ORDER BY `id_pedido`;";
           $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
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
          </tr>
          
</tbody>
</b>
<?php
          }//fim do while
        }//fim do if   
?><tr>

<?php include_once "conexao.php";
           $sql = "select p.total from pedido as p join pedido_itens as pi on p.id_pedido = pi.id_pedido where
            p.id_cliente ='".$id_cliente."' ORDER BY `id_pedido`;";
           $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){ ?>


            <th colspan="3">total</th><td colspan="2">R$<?php echo number_format($linha['total'], 2, ',', '.');}}?>
            </td>
          </tr><tr><td colspan="5" align="center"><a href="index.php">voltar</a></td></tr>
        </table>
      </center>
