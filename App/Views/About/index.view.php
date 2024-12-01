<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEasy - O nás</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <h1>ParkEasy</h1>
    <nav>
        <ul>
            <li><a href="<?= $link->url('home.index') ?>">Domov</a></li>
            <li><a href="<?= $link->url('reservation.index') ?>">Rezervácie</a></li>
            <li><a href="<?= $link->url('about.index') ?>" class="active">O nás</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>O nás</h2>
    <p>ParkEasy je systém pre správu parkovacích miest, ktorý umožňuje pohodlnú rezerváciu a správu parkovania v budove alebo na parkovisku. Naším cieľom je zjednodušiť proces parkovania a zabezpečiť efektívne využitie parkovacích miest.</p>
    <p>Kontakt: info@parkeasy.sk</p>
</main>
<footer>
    <p>&copy; 2024 ParkEasy. Všetky práva vyhradené.</p>
</footer>
</body>
</html>
