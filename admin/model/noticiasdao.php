<?php

	namespace noticiasdao;
	use \noticias\Noticia;
	use \model\Conexao;
	if($_SERVER["REQUEST_URI"] == "/admin/model/noticiasdao.php"){
			header("Location: ../../admin");
			return;
	}
	class NoticiaDAO {

		public function create(Noticia $n){
			$sql = "INSERT INTO redestrick_noticias (titulo, horario, descricao) VALUES (?, ?, ?)";
			$psmt = Conexao::getConn()->prepare($sql);
			$psmt->bindValue(1, $n->getTitulo());
			$psmt->bindValue(2, date("d/m/y - H:i:s"));
			$psmt->bindValue(3, $n->getDescricao());
			$psmt->execute();
		}
		public function read(){
			$sql = "SELECT * FROM redestrick_noticias ORDER BY id DESC";
			$psmt = Conexao::getConn()->prepare($sql);
			$psmt->execute();
			$result = $psmt->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
		}

		public function update(){

		}

		public function delte(){

		}

	}


