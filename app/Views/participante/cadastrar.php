<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/partials/form_layout.php";

$ParticipanteController = new ParticipanteController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $ParticipanteController->cadastrar($nome, $email, $telefone, $senha);
    header("Location: ../../../index.php");
    exit();
}

renderFormPageStart('Cadastrar participante', 'Adicione novos contatos para manter a base de público pronta para inscrições e relacionamento.');
?>
<form method="post">
    <div class="form-grid">
        <div class="field">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" placeholder="Nome completo" required>
        </div>

        <div class="field">
            <label for="telefone">Telefone</label>
            <input id="telefone" type="text" name="telefone" placeholder="(00) 00000-0000" required>
        </div>

        <div class="field field-full">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="contato@empresa.com" required>
        </div>

    </div>

    <div class="form-actions">
        <input type="submit" value="Salvar participante">
        <a class="btn btn-secondary" href="/draft-eventos/index.php">Voltar ao painel</a>
    </div>
</form>
<?php renderFormPageEnd(); ?>

