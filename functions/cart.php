<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id_cd, $quantity) {
	if(!isset($_SESSION['carrinho'][$id_cd])){ 
		$_SESSION['carrinho'][$id_cd] = $quantity; 
	}
}

function deleteCart($id_cd) {
	if(isset($_SESSION['carrinho'][$id_cd])){ 
		unset($_SESSION['carrinho'][$id_cd]); 
	} 
}

function updateCart($id_cd, $quantity) {
	if(isset($_SESSION['carrinho'][$id_cd])){ 
		if($quantity > 0) {
			$_SESSION['carrinho'][$id_cd] = $quantity;
		} else {
		 	deleteCart($id_cd);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho']) {
		
		$cart = $_SESSION['carrinho'];
		$products =  getProductsByid_cds($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'promocao' => $product['promocao'],
							  'disponibilidade' => $product['disponibilidade'],
							  'id_cd' => $product['id_cd'],
							  'name' => $product['titulo'],
							  'price' => $product['preco'],
							  'preco' => $product['por'],
							  'quantity' => $cart[$product['id_cd']],
							  'subtotal' => $cart[$product['id_cd']] * $product['preco'],
							  'subcon' => $cart[$product['id_cd']] * $product['por'],
						);
		}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	} 
	return $total;
}