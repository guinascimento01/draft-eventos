<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/partials/form_layout.php";

$EventoController = new EventoController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max_part = $_POST['max_part'];

    $EventoController->editar($nome, $descricao, $data, $horario, $local, $max_part, $id);
    header("Location: /draft-eventos/index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: /draft-eventos/index.php");
    exit();
}

$id = $_GET['id'];
$evento = $EventoController->buscarEvento($id);

renderFormPageStart('Editar evento', 'Ajuste detalhes operacionais e mantenha a experiência alinhada com o planejamento.');
?>
<form method="post">
    <div class="form-grid">
        <div class="field">
            <label for="nome">Nome do evento</label>
            <input id="nome" type="text" name="nome" value="<?= htmlspecialchars($evento['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="local">Local</label>
            <input id="local" type="text" name="local" value="<?= htmlspecialchars($evento['local'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field field-full">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" required><?= htmlspecialchars($evento['descricao'], ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>

        <div class="field">
            <label for="data">Data</label>
            <input id="data" type="date" name="data" value="<?= htmlspecialchars($evento['data'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="horario">Horário</label>
            <input id="horario" type="time" name="horario" value="<?= htmlspecialchars($evento['horario'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field field-full">
            <label for="max_part">Capacidade máxima</label>
            <input id="max_part" type="number" min="1" max="5000" name="max_part" value="<?= htmlspecialchars($evento['max_part'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" value="Atualizar evento">
        <a class="btn btn-secondary" href="/draft-eventos/index.php">Voltar ao painel</a>
    </div>
</form>
<?php renderFormPageEnd(); ?>

