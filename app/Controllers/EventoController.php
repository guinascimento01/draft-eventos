<?php
require_once "C:/xampp/htdocs/draft-eventos/app/Models/EventoModel.php";

class EventoController{
    private $eventoModel;

    public function __construct($pdo) {
        $this->eventoModel = new EventoModel($pdo);
    }

    public function listar(){
        $eventos = $this->eventoModel->buscarTodos();
        include_once "C:/xampp/htdocs/draft-eventos/app/Views/evento/listar.php";
        return $eventos;
    }

    public function buscarEvento($id){
        $evento = $this->eventoModel->buscarEvento($id);
        return $evento;
    }

    public function cadastrar($nome, $descricao, $data, $horario, $local, $max_part){
    return $this->eventoModel->cadastrar($nome, $descricao, $data, $horario, $local, $max_part);
    }

    public function editar($nome, $descricao, $data, $horario, $local, $max_part, $id){
        $this->eventoModel->editar($nome, $descricao, $data, $horario, $local, $max_part, $id);
    }

    public function deletar($nome, $descricao, $data, $horario, $local, $max_part, $id){
        $evento = $this->eventoModel->deletar($nome, $descricao, $data, $horario, $local, $max_part, $id);
        return $evento;
    }
}

?>