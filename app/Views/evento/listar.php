<?php

if(empty($evento)){
    echo "Nenhum evento encontrado.";
    echo "<a href='cadastrar.php'>Cadastrar um novo evento</a>";
    return;
}

    echo "<table border='1'> cellpadding='5'> cellspacing='0'>";
    echo "<tr><td>Eventos</td></tr> <a href='cadastrar.php'>Cadastrar um novo evento</a>";
    echo "<tr>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Data</td>
            <td>Horário</td>
            <td>Local</td>
            <td>Máximo de Participantes</td>
        </tr>";

foreach($eventos as $evento){
    $id = $evento['id'];
    echo "<tr>
            <td>{$evento['nome']}</td>
            <td>{$evento['descricao']}</td>
            <td>{$evento['data']}</td>
            <td>{$evento['horario']}</td>
            <td>{$evento['local']}</td>
            <td>{$evento['max_part']}</td>
            <td><a href='editar.php?id={$id}'>Editar</a></td>
            <td><a href='deletar.php?id={$id}' onclick='return confirm(\"Tem certeza que deseja deletar este evento?\")'>Deletar</a></td>
        </tr>";
 }  

echo "</table>";

?>