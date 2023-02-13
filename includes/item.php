<div class="item">
	<?php
		$preco = number_format($valor['preco'], 2, ',', ' ');
		$paymentlink = $valor['paymentlink'];
		if ($valor['desconto'] > 0.0) {
	?>
	<?php
		$precoAntigo = $preco;
		$desconto = $valor['desconto'];
		$porcentagem = (($desconto/100) * $valor['preco']);
		$preco = number_format($valor['preco']-$porcentagem, 2, ',', ' ');
		$str = "de <strike>R$ ".$precoAntigo."</strike>" . "<br> por R$ " . $preco;
	}else{
		$str = "R$ " . $preco;
	}
	?>
	<p class="titulo">
	<?php echo $valor['nome'];?> 
	<?php if ($valor['desconto'] > 0.0) { ?>
		<b><?php echo $valor['desconto'];?>% OFF</b>
	<?php } ?>
	</p>
	<img src="../imagens/imagem.php?id=<?php echo $valor['id']; ?>" width="150px">
	<div id="preco"><?php echo $str;?></div>
	<a id="comprar" href="<?php echo $paymentlink; ?>"><i class="large material-icons">shopping_cart</i></a>
	<div id="informacoes" onclick="openDropdown(<?php echo $valor['id'];?>)"><i class="large material-icons">more_horiz</i></div>
	<!-- // value="<?php //echo $valor['id'];?>" -->
</div>