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
<title>PROCURA DE CDS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
      <!-- ################################################################################################ --><!-- 
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Lorem</a></li>
        <li><a href="#">Ipsum</a></li>
        <li><a href="#">Dolor</a></li>
      </ul> -->
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
                   $result =mysqli_query($con ,$sql);
                    if($result){
                      while($linha = mysqli_fetch_array($result)){?>
               me="genero">
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
      
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('/*images/demo/backgrounds/09.jpg*/');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <li>
      <ul>
        <h3 class="heading">opções</h3>
        <LI><H5><a href="gallery.php" style="color: white;">Cds</a></H5></LI><!-- 
        <LI><H5><a href="#" style="color: white;">Categorias</a></H5></LI> -->
        <!-- <LI><H5><a href="comprado.php" style="color: white;">Compras</a></H5></LI> -->
        <LI><H5><a href="basic-grid.php" style="color: white;">Busca</a></H5></LI>
      </ul>
    </li>
    </div>
    <div class="one_third">
      <ul class="nospace meta">
        <h3 class="heading">loja de cd</h3>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul><br><br>
        <li class="btmspace-15"><i class="fa fa-phone"></i> +55 (85) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> infortech@gmail.com</li>
      </ul>
      <br><br>
      <li>
    </li>
    </div>
    <div class="one_third">
      <form method="post" action="#">
        <fieldset>
          <legend>Pra nada:</legend>
          <div class="clear">
            <input type="text" value="" placeholder="coloque seu Email aqui &hellip;">
            <button class="fa fa-share" type="submit" title="Submit"><em>Submit</em></button>
            <br><br>
      <!-- <li>
      <ul>
        <h4><a href="#" style="color: white;">sobre nos</a>
        <LI><H5><a href="#" style="color: white;">Contatos</a></H5></LI>
        <LI><H5><a href="#" style="color: white;">Equipe</a></H5></LI>
      </ul>
    </li> -->
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
    <p class="fl_left">Copyright &copy; 2018 - todos os direitos resevado a- <a href="#">equipe</a></p>
    <p class="fl_right">site esta no <a target="_blank" href="http://www.google.com/" title="Free Website Templates">Fim</a></p>
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
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>