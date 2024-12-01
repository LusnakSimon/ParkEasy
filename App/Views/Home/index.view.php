<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEasy - Prehľad parkovacích miest</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <h1>ParkEasy</h1>
    <nav>
        <ul>
            <li><a href="<?= $link->url('home.index') ?>" class="active">Domov</a></li>
            <li><a href="<?= $link->url('reservation.index') ?>">Rezervácie</a></li>
            <li><a href="<?= $link->url('about.index') ?>">O nás</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Prehľad parkovacích miest</h2>
    <div class="parking-lot">
        <div class="parking-spot free">Miesto 1 (Voľné)</div>
        <div class="parking-spot reserved">Miesto 2 (Rezervované)</div>
        <div class="parking-spot occupied">Miesto 3 (Obsadené)</div>
        <div class="parking-spot free">Miesto 4 (Voľné)</div>
    </div>
</main>
<footer>
    <p>&copy; 2024 ParkEasy. Všetky práva vyhradené.</p>
</footer>
</body>
</html>
