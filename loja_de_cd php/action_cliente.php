<?php
include "conexao.php";
 if(isset($_POST['capa']))$capa = $_POST['capa'];
 if(isset($_POST['titulo']))$titulo = $_POST['titulo'];
 if(isset($_POST['preco']))$preco = $_POST['preco'];
 if(isset($_POST['disponibilidade']))$disponibilidade = $_POST['disponibilidade'];
  if(isset($_POST['genero']))$genero = $_POST['genero'];
 if(isset($_POST['promocao']))$promocao = $_POST['promocao'];
  if(isset($_POST['descricao']))$descricao = $_POST['descricao'];
if(isset($_POST['desconto']))$desconto = $_POST['desconto'];

$_arq["pasta"]='fotos/';
$_arq["tamanho"]=1024 * 1024 *2; //2mb
$_arq['extensoes']=array ('jpg','png','gif');
$_arq['renomeia']=false;
$_arq['erros'][0]="não houve erro";
$_arq['erros'][1]="o arquivo no upload é maior do que o limite do php";
$_arq['erros'][2]="o arquivo ultrapassa o limite de tamanho especifiado no html";
$_arq['erros'][3]="o upload do arquivo foi feito parcialmente";
$_arq['erros'][4]="não foi feito o upload do aquivo";
if($_FILES['arquivo']['error']!=0){
	die("não foi possivel fazer o ulpload, erro: <br />". $_arq['erros'][$_FILES['arquivo']['error']]."<br><a href='cadastrarcd.php'>voltar</a>");
	exit;
}


else if ($_arq['tamanho'] < $_FILES['arquivo']['size']){
	echo "o aquivo enviado é muito grande, envie aquivos de ate 2mb";

}else{
	    if ($_arq['renomeia']==true) {

		$nome_final=time().'.jpg';
      	} else{
		$nome_final=$_FILES['arquivo']['name'];
	    }
	    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_arq['pasta'].$nome_final)) {
	    }else
	      {
	      	 echo "não foi possivel enviar o arquivo, tente novamente";
	      } 
  date_default_timezone_set('America/Sao_Paulo');
$anoLancamento = date('d-m-Y');
$sql=("insert into cd (id_genero, capa, titulo, preco,anoLancamento, disponibilidade, descricao,promocao,desconto,por,venda) values(
			          	'".$genero."','".$nome_final."','".$titulo."','".$preco."','".$anoLancamento."','".$disponibilidade."','".$descricao."','".$promocao."','".$desconto."','0','0')"
			          );
								echo $sql;

			          mysqli_query($con ,$sql);
			          //echo"<script>window.location='indexadm.php'</script>";
			            

}


?>