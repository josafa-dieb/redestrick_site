<?php

namespace item;

class Item{
	
	private $nome;
	private $preco;
	private $desconto;
	private $descricao;
	private $imagem;
	private $type;
	private $paymentlink;

	public function getPaymentLink(){
		return $this->$paymentlink;
	}
	public function getNome(){
		return $this->nome;
	}

	public function getPreco(){
		return $this->preco;
	}
	public function getDesconto(){
		return $this->desconto;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function getImagem(){
		return $this->imagem;
	}
	public function getType(){
		return $this->type;
	}
	public function setNome($param){
		$this->nome = $param;
	}
	public function setPreco($param){
		$this->preco = $param;
	}
	public function setDesconto($param){
		$this->desconto = $param;
	}
	public function setDescricao($param){
		$this->descricao = $param;
	}
	public function setImagem($param){
		$this->imagem = $param;
	}
	public function setType($param){
		$this->type = $param;
	}
	public function setPaymentLink($param){
		 $this->$paymentlink = $param;
	}
}