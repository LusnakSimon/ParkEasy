<?php

/** @var Array $data */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEasy - Prehľad parkovacích miest</title>
    <link rel="stylesheet" href="/public/css/styl.css">
</head>
<body>

<main>
    <h2>Prehľad parkovacích miest</h2>
    <label for="filter-status">Filtrovať parkovacie miesta:</label>
    <select id="filter-status">
        <option value="all">Všetky</option>
        <option value="free">Voľné</option>
        <option value="reserved">Rezervované</option>
        <option value="occupied">Obsadené</option>
    </select>
    <div class="parking-lot">
        <?php foreach ($data['parkings'] as $parking): ?>
            <div class="parking-spot <?= $parking->getStatus() ?>" data-status="<?= $parking->getStatus() ?>">
                <span>Miesto <?= $parking->getSpotNumber() ?></span>
                <span>(<?= ucfirst($parking->getStatus()) ?>)</span>
            </div>
        <?php endforeach; ?>
    </div>

</main>
</body>
</html>

