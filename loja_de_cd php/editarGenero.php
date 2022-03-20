<?php 
	include "heade.php";
 ?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
<center>
<?php
    include_once 'conexao.php';
    $sql='select * from genero where id_genero='.$_GET['editarGenero'];
    $result=mysqli_query($con ,$sql);
    $linha=mysqli_fetch_array($result);
    echo "<form action= 'evento.php?editarGenero=".$linha['id_genero']."'method='post'>";?>			
    genero:
     <input type="text" name="genero"  value="<?php echo $linha['nomeGenero'];?>" style="color: black;"><br><br>
      <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='indexadm.php' class="btn btn-danger">Cancelar</a>
			</form></center></center>
