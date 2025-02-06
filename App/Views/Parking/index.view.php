<?php
/** @var \App\Models\Parking[] $data */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container mt-4">
    <h2>Moje parkoviská</h2>
    <a href="<?= $link->url('parking.edit') ?>" class="btn btn-success mb-3">Vytvoriť parkovisko</a>

    <div class="row">
        <?php foreach ($data['parkings'] as $parking): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <?php if ($parking->getPhoto()): ?>
                        <img src="/public/uploads/parkings/<?= $parking->getPhoto() ?>"
                             class="card-img-top"
                             alt="<?= $parking->getTitle() ?>"
                             style="height: 200px; object-fit: cover">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= $parking->getTitle() ?></h5>
                        <p class="card-text">
                            Počet miest: <?= $parking->getNumberOfSpots() ?>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="<?= $link->url('parking.edit', ['id' => $parking->getId()]) ?>"
                               class="btn btn-primary">Upraviť</a>
                            <a href="<?= $link->url('parking.delete', ['id' => $parking->getId()]) ?>"
                               class="btn btn-danger">Zmazať</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>