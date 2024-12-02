<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <h1>ParkEasy</h1>
    <nav>
        <ul>
            <li><a href="<?= $link->url('home.index') ?>" class="<?= $_SERVER['REQUEST_URI'] === $link->url('home.index') ? 'active' : '' ?>">Domov</a></li>
            <li><a href="<?= $link->url('reservation.index') ?>" class="<?= $_SERVER['REQUEST_URI'] === $link->url('reservation.index') ? 'active' : '' ?>">Rezervácie</a></li>
            <li><a href="<?= $link->url('about.index') ?>" class="<?= $_SERVER['REQUEST_URI'] === $link->url('about.index') ? 'active' : '' ?>">O nás</a></li>
        </ul>
    </nav>
</header>
<main>
    <?= $contentHTML ?>
</main>
<footer>
    <p>&copy; 2024 ParkEasy. Všetky práva vyhradené.</p>
</footer>
</body>
</html>
