<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link rel="stylesheet" href="/public/css/styl.css">
</head>
<body class="bg-light">
<header class="bg-primary text-white text-center py-3">
    <h1><?= \App\Config\Configuration::APP_NAME ?></h1>
</header>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <?= $contentHTML ?>
        </div>
    </div>
</div>

<footer class="bg-light text-center py-3 mt-4">
    <p>&copy; 2025 <?= \App\Config\Configuration::APP_NAME ?>. Všetky práva vyhradené.</p>
</footer>

<script src="/public/js/auth.js"></script>
</body>
</html>

