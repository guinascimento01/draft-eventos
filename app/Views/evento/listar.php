<?php

if (empty($eventos)) {
    echo "<p>Nenhum evento encontrado.</p>";
    echo "<a href='/draft-eventos/app/Views/evento/cadastrar.php'>Cadastrar um novo evento</a>";
    return;
}
     
?>

<div style="margin-bottom: 20px;">
    <a href='/draft-eventos/app/Views/evento/cadastrar.php'>+ Cadastrar um novo evento</a>
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Local</th>
            <th>Máx. de Participantes</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $evento): ?>
            <?php $id = $evento['id']; ?>
            <tr>
                <td><?= $evento['nome'] ?></td>
                <td><?= $evento['descricao'] ?></td>
                <td><?= $evento['data'] ?></td>
                <td><?= $evento['horario'] ?></td>
                <td><?= $evento['local']?></td>
                <td><?= $evento['max_part'] ?></td>
                
                <td>
                    <a href="/draft-eventos/app/Views/evento/editar.php?id=<?= $id ?>">Editar</a>
                </td>
                <td>
                    <a href="/draft-eventos/app/Views/evento/deletar.php?id=<?= $id ?>" 
                       onclick="return confirm('Tem certeza que deseja deletar este evento?')" 
                       style="color: red;">
                       Deletar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>