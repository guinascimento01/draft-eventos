<?php
if (empty($eventos)) {
    ?>
    <section class="section">
        <div class="section-head">
            <div>
                <h2>Eventos</h2>
                <p>Monte uma agenda memorável com controle claro de data, local e capacidade.</p>
            </div>
            <div class="toolbar">
                <a class="btn btn-primary" href="/draft-eventos/app/Views/evento/cadastrar.php">Novo evento</a>
            </div>
        </div>
        <div class="empty-state">
            <h3>Nenhum evento encontrado</h3>
            <p>Comece cadastrando o primeiro evento para preencher este painel.</p>
        </div>
    </section>
    <?php
    return;
}
?>
<section class="section">
    <div class="section-head">
        <div>
            <h2>Eventos</h2>
            <p>Organize cronograma, ambientação e capacidade de cada entrega.</p>
        </div>
        <div class="toolbar">
            <span class="tag"><?= count($eventos) ?> cadastrados</span>
            <a class="btn btn-primary" href="/draft-eventos/app/Views/evento/cadastrar.php">Novo evento</a>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Local</th>
                    <th>Capacidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                    <?php $id = $evento['id']; ?>
                    <tr>
                        <td data-label="Nome"><?= htmlspecialchars($evento['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Descrição"><?= htmlspecialchars($evento['descricao'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Data"><?= htmlspecialchars($evento['data'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Horário"><?= htmlspecialchars($evento['horario'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Local"><?= htmlspecialchars($evento['local'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Capacidade"><?= htmlspecialchars($evento['max_part'], ENT_QUOTES, 'UTF-8') ?> pessoas</td>
                        <td data-label="Ações">
                            <div class="actions">
                                <a class="btn btn-secondary" href="/draft-eventos/app/Views/evento/editar.php?id=<?= $id ?>">Editar</a>
                                <a class="btn btn-danger" href="/draft-eventos/app/Views/evento/deletar.php?id=<?= $id ?>" onclick="return confirm('Tem certeza que deseja deletar este evento?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

