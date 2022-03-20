<style type="text/css">
  body{
    color: black;
  }
</style>

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
         <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/07.jpg');"> 
 <div class="wrapper row1">
  <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">LOJA DE CD</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="indexadm.php">Home</a></li>

          <li><?php 
          session_start();
          echo "Admin:". $_SESSION['adm'] .  "<a href='logout.php' > sair</a>"; ?></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
</div>
      
      
    