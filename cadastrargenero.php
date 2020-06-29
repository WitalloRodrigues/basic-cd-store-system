<?php 
	include "heade.php";
 ?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
 <style type="text/css">
  	body{
  		margin-top: 10%;
  	}
 </style>

 <form action="evento.php?cadastrar='true'" method="post" >
				
    genero:
     <input type="text" name="genero"><br><br>
      <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='indexadm.php' class="btn btn-danger">Cancelar</a>
			</form></center>
