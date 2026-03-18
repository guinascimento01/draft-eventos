<?php

// Verifica se a variável $participantes está vazia
if (empty($participantes)) {
    echo "<p>Nenhum participante encontrado.</p>";
    echo "<a href='/draft-eventos/app/Views/participante/cadastrar.php'>Cadastrar um novo participante</a>";
    return;
}
     
?>

<div style="margin-bottom: 20px;">
    <a href='/draft-eventos/app/Views/participante/cadastrar.php'>+ Cadastrar um novo participante</a>
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($participantes as $participante): ?>
            <?php $id = $participante['id']; ?>
            <tr>
                <td><?= htmlspecialchars($participante['nome']) ?></td>
                <td><?= htmlspecialchars($participante['email']) ?></td>
                <td><?= htmlspecialchars($participante['telefone']) ?></td>
                
                <td>
                    <a href="/draft-eventos/app/Views/participante/editar.php?id=<?= $id ?>">Editar</a>
                </td>
                <td>
                    <a href="/draft-eventos/app/Views/participante/deletar.php?id=<?= $id ?>" 
                       onclick="return confirm('Tem certeza que deseja deletar este participante?')" 
                       style="color: red;">
                       Deletar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>