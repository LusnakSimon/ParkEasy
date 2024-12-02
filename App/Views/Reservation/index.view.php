<?php
namespace App\Views\Reservation;
/** @var Array $data */
/** @var \App\Models\Reservation[] $data['reservations'] */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEasy - Rezervácie</title>
    <link rel="stylesheet" href="/public/css/styl.css">
</head>
<body>
<main>
    <h2>Rezervácie</h2>

    <form id="reservation-form" action="<?= $link->url('reservation.store') ?>" method="post">
        <label for="name">Meno:</label>
        <input type="text" id="name" name="name" required minlength="3">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="date">Dátum:</label>
        <input type="date" id="date" name="date" required min="<?= date('Y-m-d') ?>">

        <label for="time">Čas:</label>
        <input type="time" id="time" name="time" required>

        <label for="spot">Číslo parkovacieho miesta:</label>
        <select id="spot" name="spot" required>
            <?php foreach ($data['parkings'] as $parking): ?>
                <?php if ($parking->getStatus() === 'free'): ?>
                    <option value="<?= $parking->getId() ?>">Miesto <?= $parking->getSpotNumber() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <button type="submit">Rezervovať</button>
    </form>
    <h3>Existujúce rezervácie</h3>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>E-mail</th>
            <th>Dátum</th>
            <th>Čas</th>
            <th>Číslo miesta</th>
            <th>Akcie</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['reservations'] as $reservation): ?>
            <tr>
                <td><?= $reservation->getId() ?></td>
                <td><?= $reservation->getName() ?></td>
                <td><?= $reservation->getEmail() ?></td>
                <td><?= $reservation->getDate() ?></td>
                <td><?= $reservation->getTime() ?></td>
                <td>Miesto <?= $reservation->getSpotId() ?></td>
                <td>
                    <form action="<?= $link->url('reservation.edit') ?>" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $reservation->getId() ?>">
                        <button type="submit">Upraviť</button>
                    </form>
                    <form action="<?= $link->url('reservation.delete') ?>" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $reservation->getId() ?>">
                        <button type="submit">Zrušiť</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>

