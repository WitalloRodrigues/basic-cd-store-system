<?php
	include("heade.php");
if (isset($_SESSION['adm'])) {
	echo"<script>window.location='indexadm.php'</script>";
}
 ?>
<script type="text/javascript">
	$(window).load(function() {
     document.getElementById("loading").style.display = "none";
     document.getElementById("conteudo").style.display = "inline";
})
</script>
<link rel="stylesheet" href="css/test.css" />

<html>
<head>
	<!-- boot 3.3 -->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="css/jquery.min.js"></script>
  <script src="css/tata.js"></script>
  <!-- fim 3.3 -->
  <title>loja_de_cd</title>
  <style type="text/css">
  	body{
  		margin-top: 10%;
  	}#dento1{
		margin-top: -50;
		
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

}, 0);</script>
<div id="loading" style="display: block">
	<center>
    <img src="fotos/giphy.webp" style="width:150px;height:150px;" /></center>
</div>



<div id="conteudo" style="display: none">

	<?php 

				            include_once "conexao.php";
				            $sql = "select count(*) from cd";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
				            	 $qtttcd = $linha['count(*)'         ];}}
					
		if ($qtttcd >= 1) {
			
	 ?>
<!-- carosel -->

<center><h3>Teste</h3></center>
<div class="container-fluid">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="fotos/1000.png" alt="promoçoes" style="width:100%;">
        <div class="carousel-caption">
        	
        	<div id='dento1'>
        		<?php
				            include_once "conexao.php";
				            $sql = "SELECT * FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd)";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
					<?php $disponibilidade =$linha['disponibilidade'];
						            if ($disponibilidade <= 0){
						           	 $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
						           	 $pag ="#";
						           	}else{
						           	 $mostra = "Comprar";
						           	 $pag ="detalhe.php";
						           	}?>
						           	<a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='22%' height='28%'>";?></a>
						           	<?php }} ?>        	</div>
						     

        </div>
      </div>

      <div class="item">
        <img src="fotos/1000.png" alt="lançameto" style="width:100%;">
        <div class="carousel-caption">
          <div id='dento1'>
        		<?php
				            include_once "conexao.php";
				            $sql = "SELECT * FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where venda =(SELECT MAX(venda) from cd ))";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
					<?php $disponibilidade =$linha['disponibilidade'];
						            if ($disponibilidade <= 0){
						           	 $mostra = "<span style='text-decoration: line-through;'>Sem estoque!</span>";
						           	 $pag ="#";
						           	}else{
						           	 $mostra = "Comprar";
						           	 $pag ="detalhe.php";
						           	}?>
						           	<a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='22%' height='28%'>";?></a>
						           	<?php }} ?>        	</div>
        </div>
      </div>
    
      <div class="item">
        <img src="fotos/1000.png" alt="maisVendido" style="width:100%;">
        <div class="carousel-caption">
          <div id='dento1'>
        		<?php
				            include_once "conexao.php";
				            $sql = "SELECT * FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where promocao = '1')";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
					<?php $disponibilidade =$linha['disponibilidade'];
						            if ($disponibilidade <= 0){
						           	 $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
						           	 $pag ="#";
						           	}else{
						           	 $mostra = "Comprar";
						           	 $pag ="detalhe.php";
						           	}?>
						           	<a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='22%' height='28%'>";?></a>
						           	<?php }} ?>        	</div>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- fim do carrosel -->
<br><br>
<?php } ?>
<!-- fim do id(qtttcd) -->
	<!-- cds em promoçao -->
	<?php 

				            include_once "conexao.php";
				            $sql = "select count(*) from cd where promocao = '1';";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
				            	 $test = $linha['count(*)'         ];}}
					
		if ($test >= 1) {
			
	 ?>

<table class="table table-strip">
            		<thead>
            			<tr>
            				<th colspan='11'>promoçao</th>
            			</tr>	
	            		<tr>
	            			<th>capa</th>
	            			<th>titulo</th>
	            			<th>de</th>
	            			<th>desconto</th>
	            			<th>por</th>
	            			<th>venda</th>
	            		</tr>
	            	</thead>
	            	<tbody>
					<?php
				            include_once "conexao.php";
				            $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao ,c.por , c.desconto from cd as c join genero as g on c.id_genero = g.id_genero where promocao = '1' ";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
						<b>
						<tbody>
						       <tr>
						       		<?php $disponibilidade =$linha['disponibilidade'];
						            if ($disponibilidade <= 0){
						           	 $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
						           	 $pag ="#";
						           	}else{
						           	 $mostra = "Comprar";
						           	 $pag ="detalhe.php";
						           	}?>
						           <td><a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='100' height='100'>";?></a></td>
						           <td> <?php echo $linha['titulo'         ];?></td>
						           <td><span style="text-decoration: line-through;">R$<?php echo number_format($linha['preco'], 2, ',', '.')?></span></td>
						           <td> <?php echo $linha['desconto'];?>%</td>
						           <td>	R$<?php echo number_format($linha['por'], 2, ',', '.')?></td>

						           
						           <th rowspan="11"><a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"><?php echo $mostra; ?></a></th>

						       </tr>
						</tbody>
						</b>
						<?php
						          }//fim do while
						          }//fim do if 
						?>
						</table>
						<?php 
						} ?>
						<!-- agora -->	
						<!-- fim do cd em promcao -->


<?php 

				            include_once "conexao.php";
				            $sql = "select count(*) from cd ";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
				            	 $test2 = $linha['count(*)'         ];}}
					
		if ($test2 >= 1) {
			
	 ?>
						<table class="table table-strip">
            		<thead>
            			<tr>
            				<th colspan='11'>todos </th>
            			</tr>	
	            		<tr>
	            			<th>capa</th>
	            			<th>titulo</th>
	            			<th>preço</th>
	            			<th>venda</th>
	            		</tr>
	            	</thead>
	            	<tbody>
					<?php
				            include_once "conexao.php";
				            $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao , c.por from cd as c join genero as g on c.id_genero = g.id_genero ";
							$result = mysqli_query($con,$sql);
				            if($result){
				            while($linha = mysqli_fetch_array($result)){
					?>
						<b>
						<tbody>
						       <tr>
						       		<?php $disponibilidade = $linha['disponibilidade'];
						            if ($disponibilidade <= 0){
						           	 $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
						           	 $pag ="#";
						           	}else{
						           	 $mostra = "Comprar";
						           	 $pag ="detalhe.php";
						           	}?>
						           <td><a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='100' height='100'>";?></a></td>
						           <td> <?php echo $linha['titulo'         ];?></td>
						           <?php if($linha['promocao'] == 1){
						           	?>
						           	<td> R$<?php echo number_format($linha['por'], 2, ',', '.')?></td>
						           							         <?php
						           }else{?>
						           	<td> R$<?php echo number_format($linha['preco'], 2, ',', '.')?></td>
						           							         <?php } ?>
						           
						           
						           <th rowspan="11"><a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"><?php echo $mostra; ?></a></th>

						       </tr>
						</tbody>
						</b>
						<?php
						          }//fim do while
						          }//fim do if 
						?>
						</table>

						<?php 
						} ?>
						 </div>
						</body>
						<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
</head>
<body>
 
 
 
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  </script>
</head>
<body>
 
</body>
</html>



