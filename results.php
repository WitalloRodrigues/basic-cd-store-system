
  <link rel="stylesheet" href="css/test.css" />
</head>
<title>produtos | loja de cd's</title>
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
<div class="container" >
    <div class="row">
<?php 
include 'conexao.php';
$buscar=$_POST['buscar'];
$genero=$_POST['genero'];
$sql= mysql_query("SELECT * FROM  cd where titulo like '%".$buscar."%' and id_genero = '".$genero."'");
$row = mysql_num_rows($sql);
if ($row > 0) {
  while ($linha = mysql_fetch_array($sql)) {
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
          <?php
  include("heade.php");
?>