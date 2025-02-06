<?php

/** @var Array $data */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container mt-4">
    <h2>Všetky parkoviská</h2>
    <div class="row">
        <?php foreach ($data['parkings'] as $parking): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if ($parking->getPhoto()): ?>
                        <img src="/public/uploads/parkings/<?= $parking->getPhoto() ?>"
                             class="card-img-top"
                             alt="<?= $parking->getTitle() ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $parking->getTitle() ?></h5>
                        <a href="?c=reservation&a=create&spot_id=<?= $parking->getId() ?>"
                           class="btn btn-primary">Rezervovať</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

