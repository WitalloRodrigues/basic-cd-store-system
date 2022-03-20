<?php include "conexao.php"; ?>
<?php 
if(isset($_POST['inicio']))$inicio = $_POST['inicio'];
if(isset($_POST['fim']))$fim = $_POST['fim'];



if (isset($_GET['cliente'])) {
ob_start ();
define ('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
    $pdf->Cell(6,1,"CLIENTES",0,1,'R');
    $pdf->Ln();
    $pdf->Cell(2,1,"id",1,0,'C');
	$pdf->Cell(4,1,"Nome",1,0,'C');
	$pdf->Cell(3,1,"cpf",1,0,'C');
	$pdf->Cell(5,1,"E-mail",1,0,'C');
	$pdf->Cell(4,1,"Senha",1,0,'C');
	$pdf->Ln();

$sql="SELECT * FROM cliente WHERE data BETWEEN $inicio AND $fim  ";
$exe_sql=mysql_query($sql) or die (mysql_error());
while ($resultado=mysql_fetch_array($exe_sql)) {

     if ($resultado['nome']=='nulo') {
     	
     }else{

    $pdf->Cell(2,1,$resultado['id_cliente'],1,0,'L');
	$pdf->Cell(4,1,$resultado['nome']." ".$resultado['sobreNome'],1,0,'L');
	$pdf->Cell(3,1,$resultado['cpf'],1,0,'L');
	$pdf->Cell(5,1,$resultado['email'],1,0,'L');
	$pdf->Cell(4,1,$resultado['senha'],1,1,'L');
}}


$pdf->Output();
 ?>
<?php }elseif (isset($_GET['cd'])) {?>

<!-- relatorio de serviços -->
<?php 
ob_start ();

define ('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(6,1,"cds",0,1,'R');
    $pdf->Ln();
    $pdf->Cell(2,1,"id",1,0,'C');
	$pdf->Cell(4,1,"titulo",1,0,'C');
	$pdf->Cell(2,1,"preco",1,0,'C');
	$pdf->Cell(4,1,"promocao",1,0,'C');
	$pdf->Cell(5,1,"disponibilidade",1,0,'C');
	$pdf->Ln();

$sql="SELECT * FROM cd WHERE anoLancamento BETWEEN '$inicio' AND '$fim'  ";
$exe_sql=mysql_query($sql) or die (mysql_error());
while ($resultado=mysql_fetch_array($exe_sql)) {

     if ($resultado['id_cd']=='nulo') {
     	
     }else{

    $pdf->Cell(2,1,$resultado['id_cd'],1,0,'L');
	$pdf->Cell(4,1,$resultado['titulo'],1,0,'L');
	
	if ($resultado['promocao']==0) {
		$por="nao";
		$fim=$resultado['preco'];
	}else{
		$por="sim";
		$fim=$resultado['por'];
	}
	$pdf->Cell(2,1,$fim,1,0,'L');
	$pdf->Cell(4,1,$por,1,0,'L');
	$pdf->Cell(5,1,$resultado['disponibilidade'],1,1,'L');
}}


$pdf->Output();


 ?>
<?php } ?>

<!-- animais vai vendidos -->


<?php 
ob_start ();
if (isset($_POST['maiscd'])) {
	




define ('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
    $pdf->Cell(6,1,"ANIMAIS mais vendidos",0,1,'R');
    $pdf->Ln();

	$pdf->Cell(2,1,"id",1,0,'C');
	$pdf->Cell(3,1,"titulo",1,0,'C');
	$pdf->Cell(2,1,"preco",1,0,'C');
	$pdf->Cell(3,1,"promocao",1,0,'C');
	$pdf->Cell(4,1,"disponibilidade",1,0,'C');
	$pdf->Cell(2,1,"vendas",1,0,'C');
	$pdf->Ln();

$sql="SELECT * FROM cd WHERE anoLancamento BETWEEN '$inicio' AND '$fim' ORDER BY venda desc ";
$exe_sql=mysql_query($sql) or die (mysql_error());
while ($resultado=mysql_fetch_array($exe_sql)) {

     if ($resultado['id_cd']=='nulo') {
     	
     }else{

    $pdf->Cell(2,1,$resultado['id_cd'],1,0,'L');
	$pdf->Cell(3,1,$resultado['titulo'],1,0,'L');
	
	if ($resultado['promocao']==0) {
		$por="nao";
		$fim=$resultado['preco'];
	}else{
		$por="sim";
		$fim=$resultado['por'];
	}
	$pdf->Cell(2,1,$fim,1,0,'L');
	$pdf->Cell(3,1,$por,1,0,'L');
	$pdf->Cell(4,1,$resultado['disponibilidade'],1,0,'L');
	if ($resultado['venda'] == "") {
		$ved=0;
	}else{
		$ved=$resultado['venda'];
	}
	$pdf->Cell(2,1,$ved,1,1,'L');
	
}}


$pdf->Output();


 ?>
<?php } ?>


<!-- serviços mais vendidos -->
<?php 
ob_start ();
if (isset($_POST['servicosmais'])) {
	




define ('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
       $pdf->Cell(6,1,"SERVIÇOS mais vendidos",0,1,'R');
    $pdf->Ln();

	$pdf->Cell(6,1,"Nome",1,0,'C');
	$pdf->Cell(6,1,"preco",1,0,'C');
	$pdf->Cell(6,1,"Unidades vendidas",1,0,'C');
	$pdf->Ln();

$sql="SELECT * FROM servicos  WHERE data BETWEEN '$inicio' AND '$fim'  ORDER BY contador desc LIMIT 10";
$exe_sql=mysql_query($sql) or die (mysql_error());
while ($resultado=mysql_fetch_array($exe_sql)) {
  
     if ($resultado['nome']=='nulo') {
     	
     }else{


	$pdf->Cell(6,1,$resultado['nome'],1,0,'L');
	$pdf->Cell(6,1,$resultado['preco'],1,0,'L');
	$pdf->Cell(6,1,$resultado['contador'],1,1,'L');
}}


$pdf->Output();


 ?>
<?php } ?>





 <!--
  C= CENTRO
 L= ESQUERDO 
 -->