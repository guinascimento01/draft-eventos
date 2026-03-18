<?php
if (empty($inscricoes)) {
    ?>
    <section class="section">
        <div class="section-head">
            <div>
                <h2>Inscrições</h2>
                <p>Acompanhe quais participantes já confirmaram presença nos eventos.</p>
            </div>
            <div class="toolbar">
                <a class="btn btn-primary" href="/draft-eventos/app/Views/inscricao/cadastrar.php">Nova inscrição</a>
            </div>
        </div>
        <div class="empty-state">
            <h3>Nenhuma inscrição encontrada</h3>
            <p>Quando as primeiras confirmações acontecerem, elas aparecerão aqui.</p>
        </div>
    </section>
    <?php
    return;
}
?>
<section class="section">
    <div class="section-head">
        <div>
            <h2>Inscrições</h2>
            <p>Tenha visibilidade rápida de presença confirmada e movimento de público.</p>
        </div>
        <div class="toolbar">
            <span class="tag"><?= count($inscricoes) ?> registros</span>
            <a class="btn btn-primary" href="/draft-eventos/app/Views/inscricao/cadastrar.php">Nova inscrição</a>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Participante</th>
                    <th>Evento</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscricoes as $i): ?>
                    <tr>
                        <td data-label="Participante"><?= htmlspecialchars($i['participante_nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Evento"><?= htmlspecialchars($i['evento_nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Data"><?= htmlspecialchars($i['data_inscricao'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Ações">
                            <div class="actions">
                                <a class="btn btn-danger" href="/draft-eventos/app/Views/inscricao/deletar.php?id=<?= $i['id'] ?>" onclick="return confirm('Cancelar inscrição?')">Cancelar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

