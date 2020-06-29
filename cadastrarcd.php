<?php 
	include "heade.php";
 ?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
 <style type="text/css">
  	body{
  		margin-top: 10%;
  	}.row{
      padding-left: 3%;
      padding-right: 3%;
    }
 </style>

 <form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar capa so jpg</label>
					    <a href="#" class="thumbnail">
					      <img src="fotos/cd.jpg" height="190" width="150" id="foto-cliente">
					    </a>
				  	<input type="file" name="arquivo" id="foto" value="foto" required="">
			  	</div>
			  	<center>
 titulo:
  <input type="text" name="titulo" ><br>
  preco:
   <input type="text" name="preco" required=""><br>
   disponibilidade:
    <input type="text" name="disponibilidade"><br>


    genero:
     <select name="genero">
<?php
           include_once "conexao.php";
            $sql = "select * from genero";
           $result = mysqli_query($con,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?>

  <option value="<?php echo $linha['id_genero'];?>"><?php echo $linha['nomeGenero'];?></option>
        
      
<?php 
}
}
 ?>
</select><br>



     <!-- anoLancamento: -->
      <!-- <input type="text" name="anoLancamento"><br> -->
      descricao:
      <input type="text" name="descricao"><br>
      desconto: 
      <select name='desconto' value="<?php echo $linha['desconto'];?>">
        <option value="10">10%</option>
        <option value="25">25%</option>
        <option value="50">50%</option>
        <option value="75">75%</option>
        <option value="100">100%</option>
        
        
        
        
      </select><br><br>
      <button type="submit" class="btn btn-primary" id='botao'> 

			      Gravar
			    </button>
			    <a href='indexadm.php' class="btn btn-danger">Cancelar</a>
			</form></center>
