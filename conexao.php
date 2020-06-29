<HTML>
<HEAD>
 <TITLE>Conexao</TITLE>
 <meta charset="utf-8">
</HEAD>
<BODY>
  <link rel="stylesheet" href="css/test.css" />
<?php
  $host="localhost";
  $login="root";
  $senha="";
  $banco="loja_de_cd";
  $con=mysqli_connect($host,$login,$senha)or die("Erro ao conecta!".mysql_error());
  $sql="create database if not exists ".$banco;
  mysqli_query($con,$sql);
  mysqli_select_db($con,$banco);
  $sql = "create table if not exists cliente (
  id_cliente int(8) auto_increment,
  nome varchar(50) not null,
  sobreNome varchar(50) not null,
  telefone varchar(50) not null,
  cpf varchar(50) not null,
  email varchar(50) not null,
  senha varchar(50) not null,
  nivel int(10) not null,
  data varchar(50) not null,
  primary key(id_cliente))";
  mysqli_query($con,$sql);
  $sql="create table if not exists genero(
  id_genero int(10) auto_increment,
  nomeGenero varchar(100) not null,
  primary key(id_genero))";  
  mysqli_query($con,$sql);

  $sql="create table pedido (
  id_pedido int(8) auto_increment,
  id_cliente int(8) not null,
  total varchar(8)not null,
  data varchar(50) not null,
  primary key(id_pedido),
  FOREIGN KEY(id_cliente) REFERENCES cliente (id_cliente))";
  mysqli_query($con,$sql);

  $sql="create table if not exists cd (
  id_cd int(8) auto_increment,
  id_genero int(8) not null,
  capa varchar(50) not null,
  titulo varchar(50) not null,
  preco varchar(50) not null,
  anoLancamento varchar(50) not null,
  disponibilidade varchar(50) not null,
  descricao varchar(100) not null,
  promocao int(10) not null,
  desconto varchar(50) not null,
  por varchar(50) not null,
  venda varchar(100) not null,
  primary key(id_cd),
  FOREIGN KEY (id_genero) REFERENCES genero(id_genero))";
  mysqli_query($con,$sql);

  $sql="create table pedido_itens (
  id_pedido int(8) not null,
  id_cliente int(8) not null,
  PRIMARY KEY(id_cd,id_pedido),
  id_cd int(8) not null,
  quantidade int(8) not null,
  data varchar(50) not null,
  FOREIGN KEY(id_pedido) REFERENCES pedido (id_pedido),
  FOREIGN KEY(id_cliente) REFERENCES cliente (id_cliente),
  FOREIGN KEY(id_cd) REFERENCES cd (id_cd))";
  mysqli_query($con,$sql);

?>

</BODY> 
</HTML>
