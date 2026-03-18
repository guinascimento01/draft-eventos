<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Models/InscricaoModel.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Models/EventoModel.php";

class InscricaoController {
    private $inscricaoModel;
    private $eventoModel;

    public function __construct($pdo) {
        $this->inscricaoModel = new InscricaoModel($pdo);
        $this->eventoModel = new EventoModel($pdo);
    }

    public function listarInscricoes() {
        $inscricoes = $this->inscricaoModel->buscarTodasComDetalhes();
        include_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/inscricao/listar.php";
    }

    public function inscrever($participante_id, $evento_id) {
        $evento = $this->eventoModel->buscarEvento($evento_id);
        $total = $this->inscricaoModel->contarInscritosPorEvento($evento_id);

        if ($total >= $evento['max_part']) {
            header("Location: /draft-eventos/index.php?erro=lotado");
            exit();
        }

        $this->inscricaoModel->cadastrar($participante_id, $evento_id);
        header("Location: /draft-eventos/index.php");
        exit();
    }

    public function delete($id) {
        if ($this->inscricaoModel->deletar($id)) {
            header("Location: /draft-eventos/index.php?mensagem=sucesso");
        } else {
            header("Location: /draft-eventos/index.php?erro=falha_ao_deletar");
        }
        exit();
}
}