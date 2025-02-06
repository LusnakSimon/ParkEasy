<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/styl.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $link->url('home.index') ?>">ParkEasy</a>
        <div class="navbar-nav">
            <?php if ($auth->isLogged()): ?>
                <a class="nav-link" href="<?= $link->url('reservation.index') ?>">Moje rezervácie</a>
                <a class="nav-link" href="<?= $link->url('parking.index') ?>">Moje parkoviská</a>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <?= $auth->getLoggedUserName() ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= $link->url('profile.index') ?>">Profil</a></li>
                        <li><a class="dropdown-item" href="<?= $link->url('auth.logout') ?>">Odhlásiť</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a class="nav-link" href="<?= $link->url('auth.login') ?>">Prihlásiť</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main class="container mt-4">
    <?= $contentHTML ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>