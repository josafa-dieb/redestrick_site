<?php
	
	require '../admin/model/conexao.php';
	$id = $_GET['id'];
	$sql = "SELECT * FROM redestrick_imagens WHERE id = ?";
	$stmt = \model\Conexao::getConn()->prepare($sql);
	$stmt->bindValue(1, $id);
	$stmt->execute();
	$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	
	foreach ($result as $valor) {
		$tipo = $valor['tipo'];
		$conteudo = $valor['imagem'];
		header("Content-Type: ".$tipo."");
		
	}
	echo $conteudo;