<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>LISTA DE CDS</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
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
<title>Geodarn | Pages | Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/07.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">LOJA DE CD</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php">Home</a></li>
         <!-- <li class="active"><a class="drop" href="#">Pages</a>
            <ul>
               <li class="active"><a href="gallery.html">Gallery</a></li>
              <li><a href="full-width.html">Full Width</a></li>
              <li><a href="sidebar-left.html">Sidebar Left</a></li>
              <li><a href="sidebar-right.html">Sidebar Right</a></li>
              <li><a href="basic-grid.html">Basic Grid</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li> -->
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
    <!--   <ul>
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
      <div id="gallery">
        <figure>
          <header class="heading">TODOS OS CDS</header>
          <ul class="nospace clear">
            <!-- <li class="one_quarter first"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter first"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter first"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="images/demo/gallery/01.png" alt=""></a></li> -->
            <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd where promocao=0 ";
                    $result =mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $test2 = $linha['count(*)'         ];}}
          
    if ($test2 >= 1) {
      
   ?>


    <center>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
    <div class="btmspace-80 center">
    <div class="container-flueid">
        
                <div class="row">

                  <!-- buscando informaçao no banco -->

                  <?php
                    include_once "conexao.php";
                    $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao , c.por from cd as c join genero as g on c.id_genero = g.id_genero ";
                    $result = mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
          ?>

                    <div class="col-md-3 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">

                          <?php $disponibilidade = $linha['disponibilidade'];
                        if ($disponibilidade <= 0){
                         $mostra = "<span style='text-decoration: line-through;'>Esgotado!</span>";
                         $pag ="#";
                        }else{
                         $mostra = "Comprar";
                         $pag ="detalhe.php";
                        }?>
                        <div id="tam2">
                           <a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='50' height='10'>";?></a>
                        </div>
                            <div class="caption">

                                <h3><a href="#"><?php echo $linha['titulo'         ];?></a></h3>

                                <p>preço :<strong>R$<?php echo number_format($linha['preco'], 2, ',', '.')?></strong>
                                  
                                 <a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>" class="btn btn-primary"><?php echo $mostra; ?></a>

                         



                            </div>
                        </div>
                    </div>
        <?php
                      }//fim do while
                      }//fim do if 
            ?>

                    <!-- fim do buscando informaçao no banco -->
                    <!-- /.col -->
                </div>
              
                <!-- /.row -->
                
    

    <?php } ?></div></div>
    <!-- fim do vendo se tem cd -->

          </ul><!-- 
          <figcaption>TODOS OS GENEROS</figcaption> -->
        </figure>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ --><!-- 
      <nav class="pagination">
        <ul>
          <li><a href="#">&laquo; Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li><a href="#">Next &raquo;</a></li>
        </ul>
      </nav> -->
      <!-- ################################################################################################ -->
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