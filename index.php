<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/InscricaoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

$EventoController = new EventoController($pdo);
$eventos = $EventoController->buscarTodos();

$ParticipanteController = new ParticipanteController($pdo);
$participantes = $ParticipanteController->buscarTodos();

$InscricaoController = new InscricaoController($pdo);
$inscricoes = $InscricaoController->listarInscricoes();

$totalEventos = count($eventos);
$totalParticipantes = count($participantes);
$totalInscricoes = count($inscricoes);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft Eventos</title>
    <link rel="stylesheet" href="/draft-eventos/public/styles.css">
</head>
<body>
    <main class="page">
        <div class="shell">
            <section class="hero">
                <div class="hero-grid">
                    <div>
                        <p class="eyebrow">Gestão de Eventos</p>
                        <h1>DRAFT EVENTOS - Do rascunho à realidade</h1>
                        <p>Na Draft Eventos, o seu evento começa no rascunho e ganha vida com a nossa paixão. Somos especialistas em tirar ideias do papel e transformá-las em realidade. Seja um workshop corporativo ou um grande encontro social, cuidamos de toda a estrutura para que você se preocupe apenas em aproveitar o momento. Draft Eventos: Do rascunho à realidade.</p>
                    </div>
                    <div class="highlight-card">
                        <strong>Visão do dia</strong>
                        <span>Mais clareza para planejar cada evento do briefing à lotação final.</span>
                    </div>
                </div>
            </section>

            <section class="metrics">
                <article class="stat-card">
                    <small>Eventos ativos</small>
                    <strong><?= $totalEventos ?></strong>
                </article>
                <article class="stat-card">
                    <small>Participantes</small>
                    <strong><?= $totalParticipantes ?></strong>
                </article>
                <article class="stat-card">
                    <small>Inscrições</small>
                    <strong><?= $totalInscricoes ?></strong>
                </article>
            </section>

            <div class="content-grid">
                <?php include "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/evento/listar.php"; ?>
                <?php include "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/participante/listar.php"; ?>
                <?php include "C:/Turma2/xampp/htdocs/draft-eventos/app/Views/inscricao/listar.php"; ?>
            </div>
        </div>
    </main>
</body>
</html>
