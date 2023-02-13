<?php 

	require "./model/item.php";
	require "./model/itemdao.php";

	use \item\Item;
	use \itemdao\ItemDAO;

	$item = new Item();
	$itemDao = new ItemDAO();
	$actionSet = isset($_GET['action']);
	if($actionSet){
		$action = $_GET['action'];
		if($action == 2){
			if(isset($_GET['id'])){
				$itemDao->delete($_GET['id']);
				header("Location: ../admin/?opcao=2");
			}
		}
	}

	if(!empty($_POST) and isset($_POST['nome']) and 
	isset($_POST['preco']) and 
	isset($_POST['desconto']) and 
	isset($_POST['descricao'])) {
			$upload = $_FILES["imagem"];
			$temp_name = filter_var($upload['tmp_name'], FILTER_SANITIZE_STRING);
			if(!empty($temp_name)){
				$imageData = file_get_contents($temp_name);
				$sizeData = getimagesize($temp_name);
			}else{
				$imageData = null;
			}
			$item->setNome($_POST['nome']);
			$item->setPreco($_POST['preco']);
			$item->setDesconto($_POST['desconto']);
			$item->setPaymentLink($_POST['paymentlink']);
			$item->setDescricao($_POST['descricao']);
			$item->setType($upload['type']);
			$item->setImagem($imageData);
			if(!$actionSet){
				$itemDao->create($item);
				header("Location: ../admin/?opcao=2");
			}else{
				if($action == 1){
					if(isset($_GET['id'])){
						$itemDao->update($item, $_GET['id']);
						header("Location: ../admin/?opcao=2");
					}
				}
			}
	}


	?>

<div id="cadastrar-item">
	<?php 
		if($actionSet){
			if($action == 1){
				$itemData = $itemDao->read();
				foreach ($itemData as $valor) {
					if(isset($_GET['id'])){
						if($_GET['id'] == $valor['id']) {
							$nome = $valor['nome'];
							$preco = $valor['preco'];
							$desconto = $valor['desconto'];
							$paymentlink = $valor['paymentlink'];
							$descricao = $valor['descricao'];
						}
					}
				}
			}
		}
	?>
		<form method="POST" enctype="multipart/form-data">
		<input type="text" name="nome" id="nome" value="<?php if($actionSet and $action == 1): echo $nome; endif;?>" placeholder="nome">
		<input type="number" name="preco" id="preco" value="<?php if($actionSet and $action == 1): echo $preco; endif;?>" placeholder="preço" step="0.01">
		<input type="number" name="desconto" id="desconto" value="<?php if($actionSet and $action == 1): echo $desconto; endif;?>" placeholder="desconto" step="0.01">
		<input type="text" name="paymentlink" id="paymentlink" value="<?php if($actionSet and $action == 1): echo $paymentlink; endif;?>" placeholder="link de pagamento">
		<textarea type="text" name="descricao" placeholder="descricao" id="descricao"><?php if($actionSet and $action == 1): echo $descricao; endif;?></textarea>
		<input type="file" name="imagem" id="imagem" accept="image/*">
		<input type="submit" name="enviar" id="enviar">
		<label for="enviar"><i class="small material-icons">save</i></label>
		<?php 
		if($actionSet){
		$action = $_GET['action'];
		if($action == 1){
			if(isset($_GET['id'])){
				echo "<a href='../admin/?opcao=2'><i class='small material-icons'>cancel</i> </a>";
				}
			}
		}
		?>
	</form>
	<?php 
	?>
	<table class="centred">
		<thead>
			<h3>Itens cadastrado</h3>
			<tr>
				<th></th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Desconto</th>
				<th>Link Pagamento</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = $itemDao->read();
				foreach ($result as $valor) {
					$nome = $valor['nome'];
					$preco = $valor['preco'];
					$desconto = $valor['desconto'];
					$paymentlink = $valor['paymentlink'];
					$descricao = $valor['descricao'];
					$id = $valor['id'];
			?>
				<tr>
					<td><img src="../imagens/imagem.php?id=<?php echo $id;?>" width="60px"></td>
					<td><?php echo $nome; ?></td>
					<td><?php echo $preco; ?></td>
					<td><?php echo $desconto; ?></td>
					<td><?php echo $paymentlink; ?></td>
					<td><a href="?opcao=2&action=1&id=<?php echo $id; ?>"><i class="blue-text small material-icons">create</i></a></td>
					<td><a href="?opcao=2&action=2&id=<?php echo $id; ?>"><i class="red-text small material-icons">delete</i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table></div>