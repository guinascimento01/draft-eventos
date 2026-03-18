<?php

require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

$EventoController = new EventoController ($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $evento = $EventoController->buscarEvento($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastrar de Evento</title>
</head>
<body>
    
    <form action="" method="post">

        <label for="nome" >Nome do Evento:</label>
        <input type="text" name="nome" value=" <?= $evento['nome'] ?>" required> <br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="<?= $evento['descricao'] ?>" required> <br>

        <label for="data">Data:</label>
        <input type="date" name="data" value="<?= $evento['data'] ?>" required> <br>

        <label for="horario">Horário:</label>
        <input type="time" name="horario" value="<?= $evento['horario'] ?>" required> <br>

        <label for="local">Local:</label>
        <input type="text" name="local" value="<?= $evento['local'] ?>" required> <br>

        <label for="max_part">Máximo de Participantes:</label>
        <input type="number" min="1" max="150" name="max_part" value="<?= $evento['max_part'] ?>" required> <br>

        <input type="submit">

    </form>

</body>
</html>

<?php

} 

else{
    header("Location:/draft-eventos/app/Views/evento/listar.php");    
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max_part = $_POST['max_part'];

    $EventoController->editar($nome, $descricao, $data, $horario, $local, $max_part, $id);
    header("Location: /draft-eventos/index.php?erro=id_invalido");
}

?>