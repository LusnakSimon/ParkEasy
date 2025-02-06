<?php
namespace App\Views\Reservation;
/** @var Array $data */
/** @var \App\Models\Reservation[] $data['reservations'] */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */
?>
<div class="container mt-4">
    <h2>Moje rezervácie</h2>
    <div class="list-group">
        <?php foreach ($data['reservations'] as $reservation): ?>
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Parkovisko #<?= $reservation->getSpot()->getParkingId() ?></h5>
                        <div>Čas: <?= $reservation->getTimeFrom() ?> - <?= $reservation->getTimeTo() ?></div>
                    </div>
                    <a href="?c=reservation&a=delete&id=<?= $reservation->getId() ?>"
                       class="btn btn-danger btn-sm">Zrušiť</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

