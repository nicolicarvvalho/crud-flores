<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../interfaces/RepositoryInterface.php';

class ClienteRepository implements RepositoryInterface {

	private $conn;

	public function __construct() {
    	$this->conn = Database::conectar();
	}

	public function criar($cliente) {
    	$sql = "INSERT INTO clientes (nome, email, documento) VALUES (:n, :c, :e)";
    	$stmt = $this->conn->prepare($sql);
    	$stmt->execute([
        	':n' => $cliente->getNome(),
        	':c' => $cliente->getCor(),
        	':e' => $cliente->getEspecie()
    	]);
	}

	public function listar() {
    	$stmt = $this->conn->query("SELECT * FROM clientes ORDER BY id");
    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarPorId($id) {
    	$stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = :id");
    	$stmt->execute([':id' => $id]);
    	return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function atualizar($id, $cliente) {
    	$sql = "UPDATE clientes
            	SET nome=:n, email=:c, documento=:e
            	WHERE id=:id";
    	$stmt = $this->conn->prepare($sql);
    	$stmt->execute([
        	':n'  => $cliente->getNome(),
      	':c'  => $cliente->getCor(),
        	':e'  => $cliente->getEspecie(),
        	':id' => $id
    	]);
	}

	public function excluir($id) {
    	$stmt = $this->conn->prepare("DELETE FROM clientes WHERE id = :id");
    	$stmt->execute([':id' => $id]);
	}
}
?>
