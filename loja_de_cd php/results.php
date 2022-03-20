<!DOCTYPE html>
<!--
Template Name: Geodarn
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>RESULTADO</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/bootstrap.css" />
<style type="text/css">
/* DEMO ONLY */
.container .demo{text-align:center;}
.container .demo div{padding:8px 0;}
.container .demo div:nth-child(odd){color:black; background:black; text-align:center;}
.container .demo div:nth-child(even){color:black; background:black;text-align:center;}
@media screen and (max-width:1000px){.container .demo div{margin-bottom:0;}};
/* DEMO ONLY */
</style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->



<?php 

 include 'header.php'; 

 ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <!-- <div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/07.jpg');"> -->
    <div id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Lorem</a></li>
        <li><a href="#">Ipsum</a></li>
        <li><a href="#">Dolor</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h2>procura</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
        <div class="one_third first">
          <form name="searchform" method="post" action="results.php">
            <select style="width: 306px ;
                 height: 40px; " name="genero">
              <?php
                  include_once "conexao.php";
                  $sql = "select DISTINCT g.nomeGenero , g.id_genero from cd as c join genero as g on c.id_genero = g.id_genero where c.id_genero = g.id_genero";
                   $result = mysqli_query($sql,$con);
                    if($result){
                      while($linha = mysqli_fetch_array($result)){?>
               
                  <option value="<?php echo $linha['id_genero'];?>"><?php echo $linha['nomeGenero'];?></option>
                
                <?php }} ?>
              </select>
           </div>
           <div class="two_third">
              <input type='search' name="buscar" style="width: 642px;
              height: 40px;" placeholder="  titulo do cd">
         </form>
        </div>
      </div>

<h1>resultados</h1>
      <!-- resultado da pesquisa | buscado no banco de dados -->
      <style type="text/css">
  hr{
   padding-top: 10%;
  }.card{
    padding-top: 5%;
  }.col-sm-4{
    padding-top: 2%;
  }
</style>
<hr>
<div class="container-fluid" >
    <div class="row">
<?php 
include 'conexao.php';
$buscar=$_POST['buscar'];
$genero=$_POST['genero'];
$sql= ("SELECT * FROM  cd where titulo like '%".$buscar."%' and id_genero = '".$genero."'");
$result = mysqli_query($con , $sql);
$row = mysqli_num_rows($result);
if ($row > 0) {
  while ($linha = mysqli_fetch_array($result)) {
$nome=$linha['titulo'];
  $preco=$linha['preco'];
  $foto=$linha['capa'];
?>

<!-- carta -->
 <div class="col-sm-4">
          <div class="card"><center>
          <h4 class="card-title" > <?php echo "<img src='fotos/".$linha['capa']."'width='300' height='300'>";?></h4>
         <h1 class="card-title"><?php echo $nome;?></h1>
       <h1 class="card-subtitle mb-2 text-muted"> R$<?php echo $preco;?>     
              <?php $disponibilidade = $linha['disponibilidade'];
                        if ($disponibilidade <= 0){
                         $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
                         $pag ="#";
                        }else{
                         $mostra = "Comprar";
                         $pag ="detalhe.php";
                        }?>
                       <a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"><?php echo $mostra; ?></a></h1>
</center>
          </div>
        </div>
<?php 
  }
}else{
  ?><h1>
  <a href="index.php">cd não alocado no sistema!</a>
</h1>
<?php
}

 ?>
  </div><br><br>
          <h2><a href='index.php' class="btn btn-danger">Cancelar</a></h2>
 

      <!-- fim do => resultado da pesquisa | buscado no banco de dados -->




    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/09.jpg');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h3 class="heading">Geodarn</h3>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <ul class="nospace meta">
        <li class="btmspace-15"><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_third">
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <div class="clear">
            <input type="text" value="" placeholder="Type Email Here&hellip;">
            <button class="fa fa-share" type="submit" title="Submit"><em>Submit</em></button>
          </div>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html> 