<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/partials/form_layout.php";

$EventoController = new EventoController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max_part = $_POST['max_part'];

    $EventoController->cadastrar($nome, $descricao, $data, $horario, $local, $max_part);
    header("Location: ../../../index.php");
    exit();
}

renderFormPageStart('Cadastrar evento', 'Crie uma nova experiência com informações bem organizadas para facilitar a operação.');
?>
<form method="post">
    <div class="form-grid">
        <div class="field">
            <label for="nome">Nome do evento</label>
            <input id="nome" type="text" name="nome" placeholder="Ex.: Summit de Inovação" required>
        </div>

        <div class="field">
            <label for="local">Local</label>
            <input id="local" type="text" name="local" placeholder="Ex.: Centro de Convenções" required>
        </div>

        <div class="field field-full">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" placeholder="Resumo da proposta, público e atmosfera do evento." required></textarea>
        </div>

        <div class="field">
            <label for="data">Data</label>
            <input id="data" type="date" name="data" required>
        </div>

        <div class="field">
            <label for="horario">Horário</label>
            <input id="horario" type="time" name="horario" required>
        </div>

        <div class="field field-full">
            <label for="max_part">Capacidade máxima</label>
            <input id="max_part" type="number" min="1" max="5000" name="max_part" placeholder="Quantidade estimada de participantes" required>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" value="Salvar evento">
        <a class="btn btn-secondary" href="/draft-eventos/index.php">Voltar ao painel</a>
    </div>
    <p class="page-note">Preencha os dados principais para manter o cronograma e a capacidade do evento sempre atualizados.</p>
</form>
<?php renderFormPageEnd(); ?>

