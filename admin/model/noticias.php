<?php

namespace noticias;

class Noticia {

	private $titulo;
	private $descricao;

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getTitulo(){
		return $this->titulo ;
	}
	public function getDescricao(){
		return $this->descricao ;
	}


}