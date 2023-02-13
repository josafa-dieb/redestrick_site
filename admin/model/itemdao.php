<?php

namespace itemdao;

if($_SERVER["REQUEST_URI"] == "/admin/model/itemdao.php"){
		header("Location: ../../admin");
		return;
}
use \item\Item;
use \model\Conexao;

class ItemDAO {

	public function create(Item $i){
		$sql = "INSERT INTO redestrick_loja (nome, preco, desconto, paymentlink, descricao) VALUES(?, ?, ?,?, ?)";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $i->getNome());
		$stmt->bindValue(2, $i->getPreco());
		$stmt->bindValue(3, $i->getDesconto());
		$stmt->bindValue(4, $i->getPaymentLink());
		$stmt->bindValue(5, $i->getDescricao());
		$stmt->execute();
		$sql = "SELECT * FROM redestrick_loja WHERE nome = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $i->getNome());
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($result as $valor) {
			$id = $valor["id"];
		}
		$sql = "INSERT INTO redestrick_imagens (id, imagem, tipo) VALUES(?, ?, ?)";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->bindValue(2, $i->getImagem());
		$stmt->bindValue(3, $i->getType());
		$stmt->execute();
	}
	public function read(){
		$sql = "SELECT * FROM redestrick_loja";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	public function readBuyers(){
		$sql = "SELECT * FROM resgatar_compradores LIMIT 5";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function update(Item $i, $id){
		$sql = "UPDATE redestrick_loja SET nome = ?, preco = ?, desconto = ?, paymentlink = ?, descricao = ? WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $i->getNome());
		$stmt->bindValue(2, $i->getPreco());
		$stmt->bindValue(3, $i->getDesconto());
		$stmt->bindValue(4, $i->getPaymentLink());
		$stmt->bindValue(5, $i->getDescricao());
		$stmt->bindValue(6, $id);
		$stmt->execute();
		
		if($i->getImagem() != null){
			$sql = "UPDATE redestrick_imagens SET id = ?, imagem = ?, tipo = ? WHERE id = ?";
			$stmt = Conexao::getConn()->prepare($sql);
			$stmt->bindValue(1, $id);
			$stmt->bindValue(2, $i->getImagem());
			$stmt->bindValue(3, $i->getType());
			$stmt->bindValue(4, $id);
			$stmt->execute();
		}
		
	}
	public function delete($id){
		$sql = "DELETE redestrick_loja.*, redestrick_imagens.* FROM redestrick_loja, redestrick_imagens WHERE redestrick_loja.id = ? AND redestrick_imagens.id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->bindValue(2, $id);
		$stmt->execute();
	}

}