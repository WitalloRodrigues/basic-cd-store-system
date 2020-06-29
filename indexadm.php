<script type="text/javascript">
  $(window).load(function() {
     document.getElementById("loading").style.display = "none";
     document.getElementById("conteudo").style.display = "inline";
})
</script>

<?php
	include("heade.php");
?>
<?php
	include_once "conexao.php";
	 	if (isset($_SESSION['adm'])) {
		}else{
		    echo "<script> window.location=' login.php'</script>";
		}
 ?>
<html>
<head>
  <title>loja_de_cd</title>

  <style type="text/css">
  	body{
  		margin-top: 10%;
  	}#listclie{
      margin-left: 2%;
  	}#listcd{
  		margin-left: 20%;
  		margin-top:-12%;
  	}#cadcd{
  		margin-left: 80%;
  		margin-top: 10%;
  	}img{
      border-radius: 10px;
    }
  </style>
</head>
<body>
  
  <script type="text/javascript">
    var i = setInterval(function () {
    
    clearInterval(i);
  
    // O código desejado é apenas isto:
    document.getElementById("loading").style.display = "none";
    document.getElementById("conteudo").style.display = "inline";

}, 1000);</script>
  <div id="loading" style="display: block">
  <center>
    <img src="fotos/giphy.webp" style="width:150px;height:150px;" /></center>
</div>



<div id="conteudo" style="display: none">
<div id='cadcd'>




  <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from genero;";
                    $result = mysqli_query($con,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $test = $linha['count(*)'         ];}}
          
    if ($test >= 1) {
      
   ?>

|  <a href="cadastrarcd.php">cadastrar cd</a>
            <?php
                      }//fim do if
            ?>
      | <a href="relatorios.php">relatorios</a> | <br>     	 
| <a href="cadastrargenero.php">cadastrar genero</a> |
			</div>
      
      <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cliente where nivel = 0;";
                    $result = mysqli_query($con,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $qtcl = $linha['count(*)'         ];}}
          
    if ($qtcl >= 1) {
      
   ?>
   <!-- tabel de clientes -->
<div id='listclie'>	
	<table>
     <thead>
  <tr>
  	<th colspan='3'>lista de clientes</th>
  </tr>
<tr>
  <th>clientes</th>
  <td align="center">cpf</td>
  <th>excluir</th>
</tr>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:#fff;};

 
</style>
<center>
      <?php
           include_once "conexao.php";
            $sql = "select * from cliente where nivel = '0'";
            $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?>
<b>
<tbody id="myTable">
       <tr>
          <td><p> <?php echo "<a  href = infor.php?id_cliente=".$linha['id_cliente'].">";?><?php echo $linha['nome'];"</a>"?></p></td>
          <td><p> <?php echo $linha['cpf'];?></p></td>
          <td> <?php echo "<a  href = eventocd.php?deletarclie=".$linha['id_cliente']." class='btn btn-danger'>excluir</a>";?></td>
       </tr>
</tbody>
</b>
<?php
          }//fim do while
        }//fim do if  
        
?>
</table > <br>
_________________________________
<!-- fim da tabela cliente -->
<?php 
} ?>
<?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from genero;";
                    $result = mysqli_query($con,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $qtge = $linha['count(*)'         ];}}
          
    if ($qtge >= 1) {
      
   ?>
<!-- tabela de genero -->
<table>
     <thead>
  <tr>
  	<th colspan='3'>lista de genero</th>
  </tr>
<tr>
  <th>genero</th>
  <th>editar</th>
  <th>excluir</th>
</tr>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:#fff;};

 
</style>
<center>
      <?php
           include_once "conexao.php";
            $sql = "select * from genero";
            $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?>
<b>
<tbody id="myTable">
       <tr>
          <td><p> <?php echo $linha['nomeGenero'];?></p></td>
          <td> <?php echo "<a  href = editarGenero.php?editarGenero=".$linha['id_genero']." class='btn btn-info'>editar</a>";?></td>
          <td> <?php echo "<a  href = evento.php?deletar=".$linha['id_genero']." class='btn btn-danger'>excluir</a>";?></td>
       </tr>
</tbody>
</b>
<?php
          }//fim do while
        }//fim do if  
        
?>

<br><br>
</table >
</div>
<?php } ?>
<!-- fim da tabela genero -->

<?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd;";
                    $result = mysqli_query($con,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $qtcd = $linha['count(*)'         ];}}
          
    if ($qtcd >= 1) {
      
   ?>

<div id='listcd'>
            	<table class="table table-strip">
            		<thead>
            			<tr>
            				<th colspan='10'><p>lista de cds</th>
            			</tr>	
	            		<tr>
	            			<th>capa</th>
	            			<th>titulo</th>
	            			<th>preço</th>
	            			<th>dispoe</th>
	            			<th>genero</th>
	            			<th>anolanc</th>
	            			<th>descricao</th>
	            			<th>promoçao</th>
	            			<th>editar</th>
	            			<th>excluir</th>
	            		</tr>
	            	</thead>
	            	<tbody>
					<?php
				            include_once "conexao.php";
				            $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao ,c.por from cd as c join genero as g on c.id_genero = g.id_genero ";
                    $result = mysqli_query($con,$sql);
                    //var_dump($result);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
						<b>
						<tbody>
						       <tr>
						           <td> <?php echo "<img src='fotos/".$linha['capa']."'width='100' height='100'>";?></td>
						           <td> <?php echo $linha['titulo'         ];?></td>
                       <?php 
                        if($linha['promocao'] == 1){
                          $visualiza = $linha['por'];
                        }else{
                          $visualiza = $linha['preco'];
                        }
                        ?>
						           <td> R$<?php echo number_format($visualiza, 2, ',', '.')?></td>
						           <td> <?php echo $linha['disponibilidade'];?></td>
						           <td> <?php echo $linha['nomeGenero'      ];?></td>
						           <td> <?php echo $linha['anoLancamento'  ];?></td>
						           <td> <?php echo $linha['descricao'      ];?></td>
						           <?php 
						           	if($linha['promocao'] == 1){
						           		$mostra = "<a  href = promo.php?despromocao=".$linha['id_cd']."&preco=".$linha['preco'].">despromover</a>";
						           	}else{
						           		$mostra = "<a  href = promo.php?promocao=".$linha['id_cd']."&preco=".$linha['preco'].">promover</a>";
						           	}
						            ?>
						           <td> <?php echo $mostra;?></td>
						           <td> <?php echo "<a  href = editarcd.php?editarcd=".$linha['id_cd']." class='btn btn-info' >editar </a>";?></td>
						           <td> <?php echo "<a  href = eventocd.php?deletar=".$linha['id_cd']." class='btn btn-danger'>excluir</a>";?></td>
						       </tr>
						</tbody>
						</b>
						<?php
						          }//fim do while
						          }//fim do if
						           mysqli_close($con);  
						?>
						</table>
            <?php } ?>
            </div>
            
</div>

</body>

</html>
