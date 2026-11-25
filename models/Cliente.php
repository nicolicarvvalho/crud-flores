<?php

class Cliente {
	private $nome;
	private $cor;
	private $especie;

	public function __construct($nome, $cor, $especie) {
    	$this->nome = $nome;
    	$this->cor = $cor;
    	$this->especie = $especie;
	}

	public function getNome() { return $this->nome; }
	public function getCor() { return $this->cor; }
	public function getEspecie() { return $this->especie; }
}
?>
