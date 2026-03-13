<?php

class EventoModel{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array {
        $stmt = $this->pdo->query('SELECT*FROM evento');
        return $stmt->fetch (PDO::FETCH_ASSOC);
    }

    public function buscarEvento($id): array {
        $stmt = $this->pdo->query("SELECT*FROM evento WHERE id = $id");
        return $stmt->fetch (PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $descricao, $data, $horario, $local, $max_part){
        $sql = "INSERT INTO evento (nome, descricao, data, horario, local, max_part) VALUES (:nome, :descricao, :data, :horario, :local, :max_part)";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':data' => $data,
            ':horario' => $horario,
            ':local' => $local,
            ':max_part' => $max_part
        ]);
    }

    public function editar($nome, $descricao, $data, $horario, $local, $max_part, $id){
        $sql = "UPDATE evento SET nome=?, descricao=?, data=?, horario=?, local=?, max_part=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $descricao, $data, $horario, $local, $max_part, $id]);
    }

    public function deletar($nome, $descricao, $data, $horario, $local, $max_part, $id){
        $sql = "DELETE FROM evento WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

}   
  
?>