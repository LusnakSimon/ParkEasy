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
</body>
</html>

