<?php 
	include "heade.php";
 ?>
 <head>
    <meta charset="utf-8">
	<title>Edição de cd</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<style type="text/css">
	img{
		width: 300px;
		height: 300px;
	}
</style>
<?php
    include_once 'conexao.php';
    
    $sql='select * from cd where id_cd='.$_GET['editarcd'];
    $result=mysqli_query($con ,$sql);
    $linha=mysqli_fetch_array($result);
 echo "<form action= 'eventocd.php?editarcd=".$linha['id_cd']."& antes=".$linha['capa']."'method='post' id='form-contato' enctype='multipart/form-data'>";?><center>
 <div class="row">
						<label for="nome">Alterar Foto</label>
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?php echo $linha['capa'];?>" height="190" width="150" id="foto-cliente" ><br>
						    </a>
					  	<input type="file" name="arquivo" required="" id="foto" value="<?php echo $linha['capa'];?>"  >
				  	</div><br>
	        titulo:
	         <input type='text' name='titulo' value="<?php echo $linha['titulo'];?>" style="color: black;"><br>
	         preco:
			<input type='text' name='preco' value="<?php echo $linha['preco'];?>" style="color: black;"><br>
			disponibilidade:	
			<input type='text' name='disponibilidade' value="<?php echo $linha['disponibilidade'];?>" style="color: black;"><br>
			
			genero:
			<select name="genero" style="color: black;">

<?php
           include_once "conexao.php";
            $sql = "select * from genero";
           $result = mysqli_query($con ,$sql);
            if($result){
            while($linha = mysqli_fetch_array($result)){
?>

  <option value="<?php echo $linha['id_genero'];?>"><?php echo $linha['nomeGenero'];?></option>
        
      
<?php 
}
}
$sql='select * from cd where id_cd='.$_GET['editarcd'];
    $result=mysqli_query($con ,$sql);
    $linha=mysqli_fetch_array($result);
 ?>
</select style="color: black;"><br>
			
			descricao:
			<input type='text' name='descricao'  value="<?php echo $linha['descricao'];?>" style="color: black;"><br>
			desconto:	
			<select name='desconto' value="<?php echo $linha['desconto'];?>" style="color: black;">
				<option value="10">10%</option>
				<option value="25">25%</option>
				<option value="50">50%</option>
				<option value="75">75%</option>
				<option value="100">100%</option>
				
				
				
				
			</select><br>
			<br><br>

			<button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
</form>
<a href='indexadm.php' class="btn btn-danger">Cancelar</a>
</center>