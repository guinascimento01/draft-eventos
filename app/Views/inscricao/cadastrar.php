<?php
// 1. Carregar dependências e banco de dados primeiro para evitar erros de variável indefinida
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/InscricaoController.php";

// 2. Instanciar controllers para buscar os dados das listas
$partCtrl = new ParticipanteController($pdo);
$evenCtrl = new EventoController($pdo);
$inscCtrl = new InscricaoController($pdo);

// Buscar todos os registos para preencher os drop-downs
$participantes = $partCtrl->listar(); // Certifique-se que o método retorna o array
$eventos = $evenCtrl->buscarTodos(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inscCtrl->inscrever($_POST['participante_id'], $_POST['evento_id']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Realizar Inscrição</title>
</head>
<body>

    <h2>Nova Inscrição</h2>
    <form method="post">
        
        <label for="participante_id">Selecionar Participante:</label>
        <select name="participante_id" required>
            <option value="">-- Escolha um Participante --</option>
            <?php foreach ($participantes as $p): ?>
                <option value="<?= $p['id'] ?>">
                    <?= htmlspecialchars($p['nome']) ?> (ID: <?= $p['id'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="evento_id">Selecionar Evento:</label>
        <select name="evento_id" required>
            <option value="">-- Escolha um Evento --</option>
            <?php foreach ($eventos as $e): ?>
                <option value="<?= $e['id'] ?>">
                    <?= htmlspecialchars($e['nome']) ?> - Vagas: <?= $e['max_part'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <input type="submit" value="Confirmar Inscrição">
        <a href="listar.php">Voltar</a>
    </form>

</body>
</html>