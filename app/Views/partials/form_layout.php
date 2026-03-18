<?php
function renderFormPageStart(string $title, string $subtitle): void
{
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/draft-eventos/public/styles.css">
</head>
<body>
    <main class="form-page">
        <div class="shell">
            <section class="form-hero">
                <p class="eyebrow">GestÃ£o de Eventos</p>
                <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
                <p><?= htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8') ?></p>
            </section>
            <section class="panel">
<?php
}

function renderFormPageEnd(): void
{
?>
            </section>
        </div>
    </main>
</body>
</html>
<?php
}
?>
