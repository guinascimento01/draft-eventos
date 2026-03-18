<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Models/ParticipanteModel.php";

class ParticipanteController {
    private $participanteModel;

    public function __construct($pdo) {
        $this->participanteModel = new ParticipanteModel($pdo);
    }

    public function listar() {
        $participantes = $this->participanteModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/participante/listar.php";
        return $participantes;
    }

    public function buscarParticipante($id) {
        return $this->participanteModel->buscarPorId($id);
    }

    // Cadastro com Nome, Email, Telefone e Senha
    public function cadastrar($nome, $email, $telefone, $senha) {
        // Criptografa a senha antes de enviar para o Model
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        return $this->participanteModel->cadastrar($nome, $email, $telefone, $senhaHash);
    }

    // Edição (Aqui você decide se quer atualizar a senha ou não)
    public function editar($nome, $email, $telefone, $senha, $id) {
        return $this->participanteModel->editar($nome, $email, $telefone, $senha, $id);
    }

    public function deletar($id) {
        return $this->participanteModel->deletar($id);
    }
}