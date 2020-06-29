<?php 
include_once'conexao.php';
if(isset($_POST['capa']))$capa = $_POST['capa'];
 if(isset($_POST['titulo']))$titulo = $_POST['titulo'];
 if(isset($_POST['preco']))$preco = $_POST['preco'];
 if(isset($_POST['disponibilidade']))$disponibilidade = $_POST['disponibilidade'];
  if(isset($_POST['genero']))$genero = $_POST['genero'];
 if(isset($_POST['anoLancamento']))$anoLancamento = $_POST['anoLancamento'];
  if(isset($_POST['descricao']))$descricao = $_POST['descricao'];
  if(isset($_POST['desconto']))$desconto = $_POST['desconto'];
if(isset($_GET['deletarclie'])){
 $sql = "delete from cliente where id_cliente = ".$_GET['deletarclie'];
 mysqli_query($con,$sql);
 echo "<script>alert('cliente deletado com sucesso!')</script>";
 }
if(isset($_GET['deletar'])){
 $sql = "delete from cd where id_cd = ".$_GET['deletar'];
 mysqli_query($con,$sql);
 echo "<script>alert('cd deletado com sucesso!')</script>";
 }
 if(isset($_GET['editarcd'])){

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
	die("não foi possivel fazer o ulpload, erro: <br />". $_arq['erros'][$_FILES['arquivo']['error']]);
	exit;
}
$test = explode('.', $_FILES['arquivo']['name']);
//var_dump($test);

//$_FILES['arquivo']
//'name' => string 'teste.jpg' (length=9)
 // 'type' => string 'image/jpeg' (length=10)
//  'tmp_name' => string 'C:\wamp64\tmp\phpF3E5.tmp' (length=25)
 // 'error' => int 0
//  'size' => int 9972
$extensoes=strtolower(end($test));
//strtolower : coloca minuscula
//end pega oultimo valor de uma array
//divide uma strig convertendo em um array de acordo com as diviçoes escolhidas
//$extensoes=strtolower(end(explode('.', $_FILES['arquivo']['name'])));


if (array_search($extensoes, $_arq['extensoes'])===false) {
	echo "por fazer, envie arquivos com as seguintes extensoes> jpg, png, ou gif";

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

$sql = "update cd set id_genero='".$genero."',capa= '".$nome_final."',titulo='".$titulo."',preco='".$preco."',anoLancamento='".$anoLancamento."',disponibilidade='".$disponibilidade."',descricao='".$descricao."',desconto='".$desconto."'  where id_cd=".$_GET['editarcd'];
			          mysqli_query($con,$sql);    
 echo"<script> alert('cd atualizado com sucesso')</script>";
}
}
echo"<script>window.location='indexadm.php'</script>";
?>