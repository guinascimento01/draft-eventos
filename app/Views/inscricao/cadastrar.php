<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/InscricaoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/partials/form_layout.php";

$partCtrl = new ParticipanteController($pdo);
$evenCtrl = new EventoController($pdo);
$inscCtrl = new InscricaoController($pdo);

$participantes = $partCtrl->buscarTodos();
$eventos = $evenCtrl->buscarTodos();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inscCtrl->inscrever($_POST['participante_id'], $_POST['evento_id']);
}

renderFormPageStart('Nova inscrição', 'Conecte participantes aos eventos com um fluxo simples e visualmente mais refinado.');
?>
<form method="post">
    <div class="form-grid">
        <div class="field field-full">
            <label for="participante_id">Selecionar participante</label>
            <select id="participante_id" name="participante_id" required>
                <option value="">-- Escolha um participante --</option>
                <?php foreach ($participantes as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?> (ID: <?= $p['id'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="field field-full">
            <label for="evento_id">Selecionar evento</label>
            <select id="evento_id" name="evento_id" required>
                <option value="">-- Escolha um evento --</option>
                <?php foreach ($eventos as $e): ?>
                    <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nome'], ENT_QUOTES, 'UTF-8') ?> - Vagas: <?= $e['max_part'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" value="Confirmar inscrição">
        <a class="btn btn-secondary" href="/draft-eventos/index.php">Voltar ao painel</a>
    </div>
</form>
<?php renderFormPageEnd(); ?>

