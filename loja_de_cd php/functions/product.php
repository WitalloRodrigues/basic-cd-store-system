<?php 

function getProducts($pdo){
	$sql = "select c.capa , c.titulo , c.preco , c.disponibilidade , g.nomeGenero , c.anoLancamento , c.descricao , c.id_cd , c.promocao ,c.por , c.desconto from cd as c join genero as g on c.id_genero = g.id_genero where id_cd =".$_GET['id'];
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByid_cds($pdo, $id_cds) {
	$sql = "SELECT * FROM cd WHERE id_cd IN (".$id_cds.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}