<?php
class InscricaoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Busca as inscrições com os nomes reais (JOIN)
    public function buscarTodasComDetalhes(): array {
        $sql = "SELECT i.id, p.nome as participante_nome, e.nome as evento_nome, i.data_inscricao 
                FROM inscricao i
                JOIN participante p ON i.participante_id = p.id
                JOIN evento e ON i.evento_id = e.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function contarInscritosPorEvento($evento_id): int {
        $sql = "SELECT COUNT(*) as total FROM inscricao WHERE evento_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$evento_id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$res['total'];
    }

    public function cadastrar($participante_id, $evento_id) {
        $sql = "INSERT INTO inscricao (participante_id, evento_id) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$participante_id, $evento_id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM inscricao WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

}