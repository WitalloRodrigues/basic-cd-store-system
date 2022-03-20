<html>
<head>
  <title>loja_de_cd</title>
  <style type="text/css">
	body{
	  background: #F6F6F6;
	}
	#topo{
	  width: 100%;
	  left: 0;
	  top: 0;
	  background: #FFF; 
	  box-shadow: 0 0 10px #000; 
	  height: 110px;
	  position: fixed;
    z-index:9999;
	}#usuario{
      margin-left: 67%;
      margin-top: 2%;
  	  position: absolute;
  	}#usuarioad{
      margin-left: 80%;
      margin-top: 2%;
      position: absolute;
    }#pesquisa{
  	  margin-left: 27%;
  	  margin-top: 3%;
  	  position: absolute;
  	}#topo img[name="logo"]{
      float: left;
      margin-left: 100px;
      margin-top: 7px;
      position: absolute;
    }#carrinho{
    	margin-left: 80%;
    	padding-top: 0%;
    	position: absolute;
    }#btnlogin{
    	margin-left:68%;
    	margin-top: 2%;
    	position: absolute;
	}#compras{
    margin-left: 82%;
    margin-top: 2%;
  }#qtd{
    margin-left: 94%;
    margin-top: -2%;
    position: absolute;
  }
  </style>
</head>
<body>
</body>
</html>
           
<div id='topo'>

		<div id='logo'>
		<a href='index.php' ><img src='fotos/300.png' width='90' height='90' name='logo' ></a>
		</div>

<!-- butao do usuario -->

<?php
	include_once "conexao.php";
 	session_start();
	 	if (isset($_SESSION['adm'])) {
	 		?>
	 		<div id='logo'>
			<a href='indexadm.php' ><img src='fotos/300.png' width='90' height='90' name='logo'></a>
			</div>
	 		<div id='usuarioad'><?php
	    echo "<h4>Admin:". $_SESSION['adm'] .  "<a href='logout.php' class='btn btn-danger' > sair</a></h4>";
	    ?></div><?php
		}
  		else if (isset($_SESSION['nor'])) {
?>
  			<!-- barra de pesquisa -->
        <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd;";
                    $result = mysql_query($sql,$con);
                    if($result){
                    while($linha = mysql_fetch_array($result)){
                       $pum = $linha['count(*)'         ];}}?>

<?php if ($pum > 0): ?>
  

<div id='pesquisa'>
	<form name="searchform" method="post" action="results.php"><select name="genero">
<?php
           include_once "conexao.php";
            $sql = "select DISTINCT g.nomeGenero , g.id_genero from cd as c join genero as g on c.id_genero = g.id_genero where c.id_genero = g.id_genero";
           $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
?>

	<option value="<?php echo $linha['id_genero'];?>"><?php echo $linha['nomeGenero'];?></option>
    		
    	
<?php 
}
}
 ?>
</select>

    	<input type='search' name="buscar" size='40%'>
    	 <input type="submit" value="ir">
    </form>
</div>

<?php endif ?>
<!-- fim da bara de pesquisa -->
  			<div id='logo'>
			<a href='index.php' ><img src='fotos/300.png' width='90' height='90' name='logo'></a>
			</div>
  			<div id='usuario'><?php
		    echo "<h7>Cliente: " . $_SESSION['nor'] . " <a href='logout.php' class='btn btn-danger'> sair </a></h7>";?><br><?php
		    echo "<h7>Atualizar Perfil <a href = editardados.php?editar=".$_SESSION['id']." > editar </a></h7>";?></div><?php
		    ?><div id='carrinho'><?php
		    echo "<h4><a href='carrinho.php'><img src='fotos/400.jpg' width='70' height='70' name='logo'></a>";?>
          
        </div><div id='compras'><?php
        echo "<h7><a href='todas.php'>compras</a></h7>";
        ?></div>
        <div id="qtd">
  <?php 
   if (isset($_SESSION['carrinho'])) {
              $carrinho = $_SESSION['carrinho'];
              $tot = 0;
              foreach ($carrinho as $key) {
                $tot++;
              } 

              echo $tot;
            } ?>
</div>
        <?php 
		}else{
      // antes de logar
			?>
      <div id='carrinho'>
        <?php
			       echo "<h4><a href='carrinho.php'><img src='fotos/400.jpg' width='70' height='70' name='logo'></a></h4>";
             ?>
      </div>
      <div id='btnlogin'>
        <?php
		        echo "<a href='login.php'>logar</a>";
        ?>  
      </div>
		    <!-- barra de pesquisa -->
        <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd;";
                    $result = mysql_query($sql,$con);
                    if($result){
                    while($linha = mysql_fetch_array($result)){
                       $test = $linha['count(*)'         ];}}?>

<?php if ($test >= 1 ){ ?>
  

<div id='pesquisa'>
  <form name="searchform" method="post" action="results.php"><select name="genero">
<?php
           include_once "conexao.php";
            $sql = "select DISTINCT g.nomeGenero , g.id_genero from cd as c join genero as g on c.id_genero = g.id_genero where c.id_genero = g.id_genero";
           $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
?>

  <option value="<?php echo $linha['id_genero'];?>"><?php echo $linha['nomeGenero'];?></option>
        
      
<?php 
}
}
 ?>
</select>

      <input type='search' name="buscar" size='40%'>
       <input type="submit" value="ir">
    </form>
</div>

<?php } ?><?php
		}
 ?>


<!-- fim do butao do usuario -->

</div>
