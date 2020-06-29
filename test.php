<?php 
 session_start();
 include "conexao.php";


 ?>








<?php 

if(isset($_SESSION['adm'])==0){
  echo "<script> window.location='index.php'</script>";
}else{
  $meuid=$_SESSION['adm'];
  $nome=$_SESSION['adm'];

 echo "<h3>Usuario: $nome - ADMINISTRADOR<a href='logout.php'>sair</a></h3>";

}

 ?>




<form>
        <table border="2">
          <tr>
          	<td>capa</td>
            <td>titulo</td>
            <td>preco</td>
                           <td>ACAO</td>
            
          </tr>

 <?php 

$sql = "SELECT * FROM cd WHERE id_cd= 2 ";

            $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){



          


  ?>



       
          <tr>
         <td> <?php echo  "<img src='fotos/".$linha['capa']."' width='100' height='100'>";?></td>
         <td> <?php echo $linha['titulo'];?></td>
         <td> <?php echo $linha['preco'];?></td>
          <td> <?php echo "<a  href = test.php?mudar=sim&editar=2 >ALTERAR </a>";?></td>
          </tr>
        </table>
       </form>







  <?php 

  }}

   ?>




<hr>


   <?php 

if (isset($_GET['mudar'])) {




  if ($_GET['mudar']=='sim') {
    ?>

          
 <!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">




    <script type="text/javascript" src="jquery-3.2.1.js"></script>
 <script src="jquery.maskMoney.js" type="text/javascript"></script>
<!-- <script type="text/javascript">
$(function(){
 $("#valor").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })
</script> -->
</head>
  <?php
 
    $sql='select * from cd where id_cd= 2 ';
    $result=mysql_query($sql,$con);
    $linha=mysql_fetch_array($result);
    $foto=$linha['capa'];
    ?>

<body>


  <style type="text/css">
    input[type='file'] {
}
label {
  background-color: #3498db;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  margin: 10px;
  padding: 6px 20px
}
</style>



<center>

  </center>

  <?php echo "<form action= 'evento.php?editar=".$linha['id_cd']."'method='post'>";?>
   
  <br>
 <img id="mini_foto_new" class="mini_foto" src="fotos/<?php echo $foto ?>" width='100' height='100' /><p></p>
 <label for='fotoperfil'>Escolher Nova foto &#187;</label>
 <input  id='fotoperfil' onchange="readURL(this,'mini_foto_new');" type="file" name="foto" value="<?php echo $linha['capa'];?>"   required><p></p>

   titulo:
     <input type="text"  name="nomenovo" value="<?php echo $linha['titulo'];?>" required><p></p>
   preco:
     <input type="text" id="valor" name="emailnovo" value="<?php echo $linha['preco'];?>" 
  
      <button type="submit">Editar</button>
  
    

      <button type="button" onclick="window.location='index.php'" class='cancelbtn'>Cancel</button>
 
  
  </form>

</body>
</html>










<?php   

  }

?>
















<?php 



}

    ?>








    <script language="javascript" type="text/javascript">
function readURL(input, id) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#'+id)
    .attr('src', e.target.result)
    ;
               }

               reader.readAsDataURL(input.files[0]);
           }
       }
</script>