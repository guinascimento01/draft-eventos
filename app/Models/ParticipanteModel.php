<?php

class ParticipanteModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array {
        $stmt = $this->pdo->query('SELECT * FROM participante');
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function buscarPorId($id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM participante WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function cadastrar($nome, $email, $telefone, $senha) {
        $sql = "INSERT INTO participante (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            ':nome'     => $nome,
            ':email'    => $email,
            ':telefone' => $telefone,
            ':senha'    => $senha
        ]);
    }

    public function editar($nome, $email, $telefone, $id) {
        $sql = "UPDATE participante SET nome = ?, email = ?, telefone = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $telefone, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM participante WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}