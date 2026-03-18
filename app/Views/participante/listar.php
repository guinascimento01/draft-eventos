<?php
if (empty($participantes)) {
    ?>
    <section class="section">
        <div class="section-head">
            <div>
                <h2>Participantes</h2>
                <p>Mantenha seu público centralizado com dados rápidos para contato e operação.</p>
            </div>
            <div class="toolbar">
                <a class="btn btn-primary" href="/draft-eventos/app/Views/participante/cadastrar.php">Novo participante</a>
            </div>
        </div>
        <div class="empty-state">
            <h3>Nenhum participante encontrado</h3>
            <p>Cadastre participantes para iniciar suas inscrições e ações de relacionamento.</p>
        </div>
    </section>
    <?php
    return;
}
?>
<section class="section">
    <div class="section-head">
        <div>
            <h2>Participantes</h2>
            <p>Visualize rapidamente quem está na base e mantenha o cadastro limpo.</p>
        </div>
        <div class="toolbar">
            <span class="tag"><?= count($participantes) ?> cadastrados</span>
            <a class="btn btn-primary" href="/draft-eventos/app/Views/participante/cadastrar.php">Novo participante</a>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($participantes as $participante): ?>
                    <?php $id = $participante['id']; ?>
                    <tr>
                        <td data-label="Nome"><?= htmlspecialchars($participante['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Email"><?= htmlspecialchars($participante['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Telefone"><?= htmlspecialchars($participante['telefone'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-label="Ações">
                            <div class="actions">
                                <a class="btn btn-secondary" href="/draft-eventos/app/Views/participante/editar.php?id=<?= $id ?>">Editar</a>
                                <a class="btn btn-danger" href="/draft-eventos/app/Views/participante/deletar.php?id=<?= $id ?>" onclick="return confirm('Tem certeza que deseja deletar este participante?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

