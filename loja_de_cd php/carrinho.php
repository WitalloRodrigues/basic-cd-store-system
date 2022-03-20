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
<title>CARRINHO</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
              #tets{
                width: 200px;
                height: 200px;
              }
            </style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<!-- <div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/01.png');">  -->
  <!-- ################################################################################################ -->
  
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <?php 

  include 'hdnor.php'; 

 ?>
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
    <div class="content-fluid"> 
      <!-- ################################################################################################ -->

<?php 
session_start();
  require_once "functions/product.php";
  require_once "functions/cart.php";

  $pdoConnection = require_once "connection.php";

  if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
    
    if($_GET['acao'] == 'add' && isset($_GET['id_cd']) && preg_match("/^[0-9]+$/", $_GET['id_cd'])){ 
      addCart($_GET['id_cd'], 1);     
    }

    if($_GET['acao'] == 'del' && isset($_GET['id_cd']) && preg_match("/^[0-9]+$/", $_GET['id_cd'])){ 
      deleteCart($_GET['id_cd']);
    }

    if($_GET['acao'] == 'up'){ 
      if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
        foreach($_POST['prod'] as $id_cd => $qtd){
            updateCart($id_cd, $qtd);
        }
      }
    }   
    header('location: carrinho.php');
  }

  $resultsCarts = getContentCart($pdoConnection);
  $totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>carrinho</title>
  <link rel="stylesheet" href="css/test.css" />

</head>
<body>
  <div class="container">
    <div class="card mt-5">
       <div class="card-body">
          <h1 class="card-title">Carrinho</h1>
          <a href="gallery.php">Lista de produto</a>
        </div>
    </div>

    <?php if($resultsCarts) : ?>
      <form action="carrinho.php?acao=up" method="post">
      <table class="table table-strip">
        <thead>
          <tr>
            <th>CAPA</th>
            <th>CD</th>
            <th>QUANTIDADE</th>
            <th>PREÇO</th>
            <th>SUBTOTAL</th>
            <th>AÇÃO</th>

          </tr>       
        </thead>
        <tbody>
          <?php $x=0; ?>
          <?php foreach($resultsCarts as $result) : ?>
          <tr>
            <td align="center"><div id="tets"><img  src="fotos/<?php echo $result['capa']?>" ></div></td>
            
            <td><?php echo $result['name']?></td>
            <td>
              <input type="number" max="<?php echo $result['disponibilidade'] ?>" min="0" name="prod[<?php echo $result['id_cd']?>]" value="<?php echo $result['quantity']?>" size="1" />     
              </td>
              <?php if ($result['promocao'] == 0){?>
                <td>R$<?php echo number_format($result['price'], 2, ',', '.')?></td>
                <td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
                <?php $tot = $result['subtotal']; ?>
                <?php $x +=$tot ; ?>
                
              <?php }else{?>
                <td>R$<?php echo number_format($result['preco'], 2, ',', '.')?></td>
                <td>R$<?php echo number_format($result['subcon'], 2, ',', '.')?></td>
                <?php $tot = $result['subcon']; ?>
                <?php $x +=$tot ; ?>
               <?php } ?>
            
            
            <td><a href="carrinho.php?acao=del&id_cd=<?php echo $result['id_cd']?>" class="btn btn-danger">Remover</a></td>
            
          </tr>
        <?php endforeach;?>
         <tr>
          <td colspan="2" align="center">
      <a class="btn btn-info" href="index.php">Continuar Comprando</a>
      <button class="btn btn-primary" type="submit">Atualizar Carrinho</button></td>
          <td  class="text-right"><b>Total: </b></td>
          <td>R$<?php echo number_format($x, 2, ',', '.')?></td>
          <td colspan="2" align="center"><a class="btn btn-info" href="compra.php">Compra</a> </td>
         </tr>
        </tbody>
        
      </table>
   <?php 
       $_SESSION['dados'] = $resultsCarts ;
       ?>
      </form>
  <?php endif?> 
  <?php if (!$_SESSION['carrinho']) {
    echo "<center>";
    echo "<h1>carrinho vazio</h1>";
    echo "</center>";
    echo "<script>alert('carrinho vazio!')</script>";
  } ?>
      </div>
      <div id="comments">
        <h2>Comentarios</h2>
        <ul>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">witallo</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">sexta-feira, 4<sup>/°</sup> Abril 2018 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>muito bom , nota 10</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">Rael</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">sexta-feira, 4<sup>/°</sup> Abril 2018 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>E bom</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">Carlos</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">sexta-feira, 4<sup>/°</sup> Abril 2018 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>ta bom</p>
              </div>
            </article>
          </li>
        </ul>
        <h2> ESCREVA UM COMENTARIO</h2>
        <form action="#" method="post">
          <div class="one_third first">
            <label for="name">NOME <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">EMAIIL <span>*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="comment">SEU COMENTARIO</label>
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="ENVIAR FORMULARIO">
            &nbsp;
            <input type="reset" name="reset" value="RESETAR FORMULARIO">
          </div>
        </form>
      </div>
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
        <!-- <LI><H5><a href="#" style="color: white;">Compras</a></H5></LI> -->
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