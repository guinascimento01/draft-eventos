<?php
// O Controller já carregou os dados em $inscricoes antes de incluir este arquivo
if (empty($inscricoes)) {
    echo "<p>Nenhuma inscrição encontrada.</p>";
    echo "<a href='/draft-eventos/app/Views/inscricao/cadastrar.php'>Nova Inscrição</a>";
    return;
}
?>

<div style="margin-bottom: 20px;">
    <a href='/draft-eventos/app/Views/inscricao/cadastrar.php'>+ Nova Inscrição</a>
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Participante</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inscricoes as $i): ?>
            <tr>
                <td><?= htmlspecialchars($i['participante_nome']) ?></td>
                <td><?= htmlspecialchars($i['evento_nome']) ?></td>
                <td><?= $i['data_inscricao'] ?></td>
                <td>
                    <a href="/draft-eventos/app/Views/inscricao/deletar.php?id=<?= $i['id'] ?>" 
                       onclick="return confirm('Cancelar inscrição?')" 
                       style="color: red;">Cancelar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>