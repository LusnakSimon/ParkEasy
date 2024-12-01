<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEasy - Rezervácie</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <h1>ParkEasy</h1>
    <nav>
        <ul>
            <li><a href="<?= $link->url('home.index') ?>">Domov</a></li>
            <li><a href="<?= $link->url('reservation.index') ?>" class="active">Rezervácie</a></li>
            <li><a href="<?= $link->url('about.index') ?>">O nás</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Rezervácie</h2>
    <form action="<?= $link->url('reservation.store') ?>" method="post">
        <label for="name">Meno:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="date">Dátum:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Čas:</label>
        <input type="time" id="time" name="time" required>

        <label for="spot">Číslo parkovacieho miesta:</label>
        <input type="number" id="spot" name="spot" required>

        <button type="submit">Rezervovať</button>
    </form>
</main>
<footer>
    <p>&copy; 2024 ParkEasy. Všetky práva vyhradené.</p>
</footer>
</body>
</html>

