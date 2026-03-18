<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/partials/form_layout.php";

$ParticipanteController = new ParticipanteController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $ParticipanteController->editar($nome, $email, $telefone, null, $id);
    header("Location: /draft-eventos/index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: /draft-eventos/index.php");
    exit();
}

$id = $_GET['id'];
$participante = $ParticipanteController->buscarParticipante($id);

renderFormPageStart('Editar participante', 'Atualize os dados de contato sem perder agilidade na operação do evento.');
?>
<form method="post">
    <div class="form-grid">
        <div class="field">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" value="<?= htmlspecialchars($participante['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="telefone">Telefone</label>
            <input id="telefone" type="text" name="telefone" value="<?= htmlspecialchars($participante['telefone'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field field-full">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?= htmlspecialchars($participante['email'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" value="Atualizar participante">
        <a class="btn btn-secondary" href="/draft-eventos/index.php">Voltar ao painel</a>
    </div>
    <p class="page-note">A edição mantém foco nos dados de contato. Se quiser, depois podemos criar um fluxo específico para redefinição de senha.</p>
</form>
<?php renderFormPageEnd(); ?>

