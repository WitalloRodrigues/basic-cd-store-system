
      <?php
  include_once "conexao.php";
  session_start();
    if (isset($_SESSION['adm'])) {
      ?>
      <style type="text/css">
        body{
          color: black;
        }
      </style>
      <?php
    }
      else if (isset($_SESSION['nor'])) {
?>  

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
         <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/07.jpg');"> 
 <div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="indexadm.php">administrador</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li> -->
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">LOJA DE CD</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php"> <span class="glyphicon glyphicon-home fa-1x">HOME</span></a></li>
          <li><a class="drop" href="#"><i class="fa fa fa-ellipsis-v fa-1x">  OPÇÕES</i></a>
            <ul>
              <li><a href="gallery.php">Cds</a></li>
              <!-- <li><a href="#">Categorias</a></li> -->
              <li><a href="comprado.php">compras</a></li>
              <li><a href="basic-grid.php">Buscar</a></li>
             <!--  <li><a href="#l">sobre</a></li> -->
            </ul>
          </li>
          <!-- <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="indexadm.php">administrador</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li> -->
          
          <li><a class="drop" href="carrinho.php"><i class="fa fa-shopping-cart fa-1x">   CARRINHO</i></a>
            <!-- <ul>
              <li><a href="#">total => R$ 74,30</a></li>
              <li><a class="drop" href="#">prdutos => 3</a>
                <ul>
                  <li><a href="#">feiao => R$ 19,90</a></li>
                  <li><a href="#">arroz => R$ 19,90</a></li>
                  <li><a href="#">macarrão => R$ 19,90</a></li>
                </ul>
              </li>
            </ul> -->
        </li>



          <li><a class="drop" href="#"><i class="fa fa-sign-out fa-1x"> <?php  echo $_SESSION['nor'] ?></i></a>
          <ul>
            <li><?php
        echo "<a href = editardados.php?editar=".$_SESSION['id']." > Atualizar perfil </a>";?></li>
            <li><a href="logout.php">sair</a></li>
          </ul>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
</div>
      <?php }else{?>
      <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/07.jpg');"> 
       <div class="wrapper row1">
  <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">LOJA DE CD</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php"> <span class="glyphicon glyphicon-home fa-1x">HOME</span></a></li>
          <li><a class="drop" href="#"><i class="fa fa fa-ellipsis-v fa-1x">  OPÇÕES</i></a>
            <ul>
              <li><a href="gallery.php">Cds</a></li><!-- 
              <li><a href="#">Categorias</a></li> -->
              <!-- <li><a href="#">Compras</a></li> -->
              <li><a href="basic-grid.php">Buscar</a></li>
              <!-- <li><a href="#">Sobre</a></li> -->
            </ul>
          </li>
          <!-- <li><a class="drop" href="#">Dropdown</a> -->
           <!--  <ul>
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
          </li> -->


          <li><a class="drop" href="carrinho.php"><i class="fa fa-shopping-cart fa-1x">   CARRINHO</i></a>
           <!--  <ul>
              <li><a href="#">total => R$ 74,30</a></li>
              <li><a class="drop" href="#">prdutos => 3</a>
                <ul>
                  <li><a href="#">feiao => R$ 19,90</a></li>
                  <li><a href="#">arroz => R$ 19,90</a></li>
                  <li><a href="#">macarrão => R$ 19,90</a></li>
                </ul>
              </li>
            </ul> -->
        </li>


<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

          <li><a href="login.php"><i class="fa fa-sign-in fa-1x">  LOGIN</i></a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
</div>
     <?php } ?>
      
    