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
<title>LOJA DE CD`S</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
    <meta charset='utf-8'>
<style type="text/css">
  #tam{
    width: 300px;
    height: 300px;
  }#mm{
    background-color: black;
    margin-left: -20;
    padding-left: 0;
  }
</style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/07.jpg');"> 
  <!-- ################################################################################################ -->
 <?php 

 include 'header.php'; 

 ?>

 
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="flexslider basicslider">
      <ul class="slides">
       
        <li>
          <article>
            <p>lançamento</p>
            <center>
              <!-- pegando o ultimo cd do banco de dados(lancanemmto) -->

<div id="tam">
              <?php
                    include_once "conexao.php";
                    $sql = "SELECT * FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where disponibilidade > 0)";
                    $result = mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
          ?>
          <h3 class="heading"><?php echo $linha['titulo']; ?> </h3>
          <?php $disponibilidade =$linha['disponibilidade'];
                        if ($disponibilidade <= 0){
                         $mostra = "<span style='text-decoration: line-through;'>Sem estoque!</span>";
                         $pag ="#";
                        }else{
                         $mostra = "Comprar";
                         $pag ="detalhe.php?id=".$linha['id_cd'];
                        }?>
                        <a  href="<?php echo $pag ?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='22%' height='28%'>";?></a>
                                 </div>

<?php if($linha['promocao'] == 1){
                        ?>
                        <h2> R$<?php echo number_format($linha['por'], 2, ',', '.')?></h2>
                                             <?php
                       }else{?>
                        <h2> R$<?php echo number_format($linha['preco'], 2, ',', '.')?></h2>
                                             <?php } ?>
                                           </center>
            <footer>
              </footer>
              <?php 
                echo "<a class='btn inverse' href=".$pag.">".$mostra." </a>";
               ?>
          </article>
        </li>
<?php }} ?>
            <!--fim do=> pegando o ultimo cd do banco de dados(lancanemmto) -->

            
        <li>
          <article>
            <p>mais vendido</p>
            <center>
            
<!-- bucando imagem na pasta -->
<div id='tam'>
            <?php
                    include_once "conexao.php";
                    $sql = "SELECT * FROM cd WHERE id_cd = (SELECT MAX(id_cd) from cd where venda =(SELECT MAX(venda) from cd ))";
                    $result = mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
          ?>
          <h3 class="heading"><?php echo $linha['titulo']; ?> </h3>
          <?php $disponibilidade =$linha['disponibilidade'];
                        if ($disponibilidade <= 0){
                         $mostra = "<span style='text-decoration: line-through;'>Sem estoque!</span>";
                         $pag ="#";
                        }else{
                         $mostra = "Comprar";
                         $pag ="detalhe.php?id=".$linha['id_cd'];
                        }?>
                        <a  href="<?php echo $pag ?>"> <?php echo "<img src='fotos/".$linha['capa']."'width='22%' height='28%'>";?></a>
                                 </div>

                        <!-- fim do =>bucando imagem na pasta -->

            <?php if($linha['promocao'] == 1){
                        ?>
                        <h2> R$<?php echo number_format($linha['por'], 2, ',', '.')?></h2>
                                             <?php
                       }else{?>
                        <h2> R$<?php echo number_format($linha['preco'], 2, ',', '.')?></h2>
                                             <?php } ?>
                                              </center>
            <footer>
              <?php 
                echo "<a class='btn inverse' href=".$pag.">".$mostra." </a>";
               ?>
            </footer>
          </article>
        </li>
                                             <?php }} ?>
          
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper --> 
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3 ">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->

    <?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd where promocao = '1';";
                    $result = mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $qtcd = $linha['count(*)'         ];}}
          
    if ($qtcd >= 1) {
      
   ?>
    <div class="btmspace-80 center">
      <h3 class="nospace">promoçoes</h3>
      <p class="nospace">copra logo</p>
    </div>
    <ul class="nospace group services">
      
      

<!-- cd em promocao -->



          <?php
                    include_once "conexao.php";
                    $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao ,c.por , c.desconto from cd as c join genero as g on c.id_genero = g.id_genero where promocao = '1' ";
                    $result = mysqli_query($con ,$sql);
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
                         $mostra = "ver detalhes  &raquo;";
                         $pag ="detalhe.php";
                        }?>
                       
            </b>

              <li class="one_third ">
            <article class="bgded overlay" style="background-image:url(<?php echo "fotos/".$linha['capa']; ?>);">

              <div class="txtwrap">
            <h6 class="heading"><br><br><br><?php echo $linha['titulo'         ];?><br><br><br><br><br><br></h6>
            <p>Preço de <span style="text-decoration: line-through;"> R$<?php echo number_format($linha['preco'], 2, ',', '.')?></span> ,com o desconto de <?php echo $linha['desconto'];?>% fica por apenas
             R$<?php echo number_format($linha['por'], 2, ',', '.')?></p>
          </div>
          <footer><a  href="<?php echo $pag ?>?id=<?php echo $linha['id_cd'];?>"><?php echo $mostra; ?></a></footer>
        </article>
            <?php
                      }//fim do while
                      }//fim do if 
            ?>
            <?php 
            }?>
            <!-- agora -->  
        

<!--  fim cd em promocao -->

    </ul>

    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->

<!-- vendo se tem cd -->

<?php 

                    include_once "conexao.php";
                    $sql = "select count(*) from cd where promocao=0 ";
                    $result = mysqli_query($con ,$sql);
                    if($result){
                    while($linha = mysqli_fetch_array($result)){
                       $test2 = $linha['count(*)'         ];}}
          
    if ($test2 >= 1) {
      
   ?>


    <div class="btmspace-80 center">
      <h2 class="nospace">cds</h2>
      <p class="nospace">compra um ae.</p>
    </div>
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
                    $sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao , c.por from cd as c join genero as g on c.id_genero = g.id_genero where c.promocao = 0";
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

                <!-- /.row -->
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('.images/demo/backgrounds/09.jpg');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <li>
      <ul>
        <h3 class="heading">opções</h3>
        <LI><H5><a href="gallery.php" style="color: white;">Cds</a></H5></LI><!-- 
        <LI><H5><a href="#" style="color: white;">Categorias</a></H5></LI> -->
        <!-- <LI><H5><a href="pages/gallery.php" style="color: white;">Compras</a></H5></LI> -->
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