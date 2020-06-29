<head>
	<style type="text/css">
		body{
			padding-top: 10%; 
		}
	</style>
</head>
<center>
<?php 
include("headelog.php");
session_start();
include "conexao.php";

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
 
  	<table border="2">


<tr>
	<td>clientes</td>
	<td>cds</td>
	<td>cds +vendidos</td>
</tr>


 <tr>
  
	 <td><a href="relatorios.php?gerar=1">	relatório de clientes</a></td>
     <td>	<a href="relatorios.php?gerar=2">relatório  cds </a></td>
      <td><a href="relatorios.php?gerar=3"> cds mais vendidos</a> </td>



</tr>
</table>


</body>
</html>
<?php 
if (isset($_GET['gerar'])) {
    if ($_GET['gerar']=='1') {



 ?>
<h1>RELATORIO DE USUARIOS</h1>

<form  action="geraPDF.php?cliente=true" method="post">
	
<table border="2">

<tr>
	
	<td>DATA INICIAL</td>
	<td>DATA FINAL</td>
</tr>


<tr>
     <td>
    <select  name="inicio" required>
		 <?php 
           $consultar= "SELECT DISTINCT data from cliente where nivel = 0";
           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['data'];
           
              if ($linha['data']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
	</select>
     </td>


<td>
   <select name="fim" required >
	 <?php 
           $consultar= "SELECT DISTINCT data from cliente where nivel =0";
           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['data'];
           
              if ($linha['data']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
	</select>
 </td>
     </tr>


     <tr>
	 <td colspan="2" align="center"><input type="submit"  name="clientes" value="GERAR" ></td>
 </tr>





</table>

</form>





<table border="2">

  
<tr>
  <th>id</th> 
  <th>nome</th>
  <th>email</th>
  <th>senha</th>
  <th>CPF</th>
  <th>telefone</th>
 
 
</tr>
<?php 



   $sql= "select * from cliente where nivel = 0";
           $resultado = mysqli_query($con,$sql) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
       if ($linha['nome']=='nulo') {
       
       }else{




?>



     
	   <tr>
	 	
        <!-- <td><?php echo "<img src='fotos/".$linha['foto']."' width='100' height='100'>"?></td> -->
        <td><?php echo $linha['id_cliente'] ?></td>
	 	<td><?php echo $linha['nome'];?></td>
	 	<td><?php echo $linha['email'];?></td>
	 	<td><?php echo $linha['senha'];?></td>
	 	<td><?php echo $linha['telefone'];?></td>
	 	<td><?php echo $linha['cpf'];?></td>
	 </tr>

<?php 

}
}


?>

</table>
<a href="indexadm.php">VOLTAR</a>

<?php } ?>





<?php 

    if ($_GET['gerar']=='2') {
      
      ?>







<h1>GERAR RELATORIO CDS</h1>

<form  action="geraPDF.php?cd=true" method="post">
  
<table border="2">

<tr>
  
  <td>DATA INICIAL</td>
  <td>DATA FINAL</td>
</tr>


<tr>
     <td>
    <select  name="inicio" required>
     <?php 
           $consultar= "SELECT DISTINCT anoLancamento from cd";
           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['anoLancamento'];
           
              if ($linha['anoLancamento']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
  </select>
     </td>


<td>
   <select name="fim" required >
   <?php 
           $consultar= "SELECT DISTINCT anoLancamento from cd";
           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['anoLancamento'];
           
              if ($linha['anoLancamento']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
  </select>
 </td>
     </tr>


     <tr>
   <td colspan="2" align="center"><input type="submit"  name="servicos" value="GERAR" ></td>
 </tr>





</table>




</form>
<table border="2">

<tr>

   <th>capa</th>
   <th>id</th>
   <th>titulo</th>
  <th>preco</th>
  <th>descricao</th>
  <th>disponibilidade</th>
 
</tr>

<?php 



   $sql= "select * from cd";
           $result = mysqli_query($con,$sql) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($result))  {
       if ($linha['titulo']=='nulo') {
       
       }else{




?>
     
	   <tr>
	 	
        <td><?php echo "<img src='fotos/".$linha['capa']."' width='100' height='100'>"?></td>
        <td><?php echo $linha['id_cd'] ?></td>
	 	<td><?php echo $linha['titulo'];?></td>
	 	<td><?php echo $linha['preco'];?></td>
	 	<td><?php echo $linha['descricao'];?></td>
	 	<td><?php echo $linha['disponibilidade'];?></td>
	 </tr>
<?php 

}
}
 

?>

</table>

</form>

<a href="indexadm.php">VOLTAR</a>
<?php } ?>




<?php 

    if ($_GET['gerar']=='3') {
 ?>


<h1>ANIMAIS MAIS VENDIDOS</h1>

<form  action="geraPDF.php" method="post">
  
<table border="2">

<tr>
  
  <td>DATA INICIAL</td>
  <td>DATA FINAL</td>
</tr>


<tr>
     <td>





    <select  name="inicio" required>



     <?php 
      



           $consultar= "SELECT DISTINCT anoLancamento FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where venda =(SELECT MAX(venda) from cd ))";

           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['anoLancamento'];
               // $idproduto= $linha['itens_prod'];
           
              if ($linha['anoLancamento']=="") {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}



         ?>





  </select>







     </td>


<td>
   <select name="fim" required >
   <?php 
           $consultar= "SELECT DISTINCT anoLancamento FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where venda =(SELECT MAX(venda) from cd ))";
           $resultado = mysqli_query($con,$consultar) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($resultado))  {
              $data= $linha['anoLancamento'];
           
              if ($linha['anoLancamento']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
  </select>
 </td>
     </tr>


     <tr>
   <td colspan="2" align="center"><input type="submit"  name="maiscd" value="GERAR" ></td>
 </tr>





</table>


</form>







<table border="2">













<tr>
  <th>capa</th>
   <th>titulo</th>
  <th>preco</th>
  <th>disponibilidade</th>
   <th>vendas</th>
</tr>



 <?php 
        
  $sql= "SELECT * from cd ORDER BY venda desc";
           $result = mysqli_query($con,$sql) or die (mysqli_error());
           while ($linha = mysqli_fetch_array($result))  {
if ($linha['venda']=="") {
 $ved=0;
}else{
	$ved=$linha['venda'];
}
       if ($linha['titulo']=='nulo') {
       
       }else{

        ?>
      
<tr>
   <td><?php echo "<img src='fotos/".$linha['capa']."' width='100' height='100'>"?></td>
    <td><?php echo $linha['titulo'];?></td>
    <td><?php echo $linha['preco'];?></td>
    <td><?php echo $linha['disponibilidade'];?></td>
    <td><?php echo $ved;?></td>
   

</tr>

 
<?php 
}

}

 ?>

</table>
<a href="indexadm.php">VOLTAR</a>


<?php } ?>


















<!-- servicos mais vendidos -->
<?php 


    if ($_GET['gerar']=='4') {
    	
          ?>

      <h1>SERVIÇOS MAIS VENDIDOS</h1>

<form  action="gerarpdf.php" method="post">
  
<table border="2">

<tr>
  
  <td>DATA INICIAL</td>
  <td>DATA FINAL</td>
</tr>


<tr>
     <td>





    <select  name="inicio" required>
      <option value="" >inicial</option>



     <?php 
      



           $consultar= "SELECT DISTINCT data from servicos ";

           $resultado = mysql_query($consultar) or die (mysql_error());
           while ($linha = mysql_fetch_array($resultado))  {
              $data= $linha['data'];
               // $idproduto= $linha['itens_prod'];
           
              if ($linha['data']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}



         ?>





  </select>







     </td>


<td>
   <select name="fim" required >
    <option value=""  >fim</option>
   <?php 
           $consultar= "SELECT DISTINCT data from servicos";
           $resultado = mysql_query($consultar) or die (mysql_error());
           while ($linha = mysql_fetch_array($resultado))  {
              $data= $linha['data'];
           
              if ($linha['data']==0) {
               
              }else{
              echo "<option value='$data' required>$data</option>";
           }
}
         ?>
  </select>
 </td>
     </tr>


     <tr>
   <td colspan="2" align="center"><input type="submit"  name="servicosmais" value="GERAR" ></td>
 </tr>





</table>


</form>







<table border="2">













<tr>
   <th>foto </th>
    <th>nome</th>
   <th>preco</th>
   <th>disponibilidade</th>
     <th>contador</th>
</tr>



 <?php 
        
  $sql= "SELECT * from servicos ORDER BY contador desc";
           $result = mysql_query($sql) or die (mysql_error());
           while ($linha = mysql_fetch_array($result))  {



       if ($linha['nome']=='nulo') {
       
       }else{

        ?>
      
<tr>
   <td><?php echo "<img src='fotos/".$linha['foto']."' width='100' height='100'>"?></td>
    <td><?php echo $linha['nome'];?></td>
    <td><?php echo $linha['preco'];?></td>
    <td><?php echo $linha['disponibilidade'];?></td>
    <td><?php echo $linha['contador'];?></td>
   

</tr>

 
<?php 
}

}

 ?>

</table>







<?php 


    }

?>
</center>







<!-- final do get -->

<?php 
}


 ?>