</html>
<?php if (isset($_SESSION['tot'])) {
  $tot = $_SESSION['tot'];
 
}  echo $tot;?>
<form method="post" action="compra.php?vt=<?php echo $tot ?>">
forma de pagamento:
<select name="fp"><option value="a vista">a vista</option>
    <option value="prazo">prazo</option>
</select>
tipo de pagamento:
<select name="tp"><option value="cartao">cartao</option>
    <option value="boleto">boleto</option>
    <option value="bancario">bancario</option>
</select>
opçao de envio:
<select name="oe"><option value="maritimo">maritimo</option>
    <option value="aerio">aerio</option>
</select>
endereço de entrega:
<input type="text" name="end">
<input type="submit" value="confirmar compra"></form>
  </body>