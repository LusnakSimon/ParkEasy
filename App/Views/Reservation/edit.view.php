<?php

/** @var \App\Models\Reservation $data['reservation'] */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */
$reservation = $data['reservation'];

?>

<h2>Upraviť rezerváciu</h2>

<form id="edit-reservation-form" action="<?= $link->url('reservation.update') ?>" method="post">
    <input type="hidden" name="id" value="<?= $reservation->getId() ?>">

    <label for="name">Meno:</label>
    <input type="text" id="name" name="name" value="<?= $reservation->getName() ?>" required minlength="3">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?= $reservation->getEmail() ?>" required>

    <label for="date">Dátum:</label>
    <input type="date" id="date" name="date" value="<?= $reservation->getDate() ?>" required min="<?= date('Y-m-d') ?>">

    <label for="time">Čas:</label>
    <input type="time" id="time" name="time" value="<?= $reservation->getTime() ?>" required>

    <label for="spot">Číslo parkovacieho miesta:</label>
    <select id="spot" name="spot" required>
        <?php foreach ($data['parkings'] as $parking): ?>
            <option value="<?= $parking->getId() ?>" <?= $parking->getId() === $reservation->getSpotId() ? 'selected' : '' ?>>
                Miesto <?= $parking->getSpotNumber() ?> (<?= ucfirst($parking->getStatus()) ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Uložiť zmeny</button>
</form>

