<?php
/** @var \App\Models\Parking|null $data */
/** @var \App\Core\LinkGenerator $link */
$parking = $data['parking'] ?? null;
$isEdit = ($parking !== null);
?>

<div class="container mt-4">
    <h2><?= $isEdit ? 'Upraviť parkovisko' : 'Vytvoriť parkovisko' ?></h2>

    <form method="post" enctype="multipart/form-data"
          action="<?= $link->url('parking.save') ?>">

        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $parking->getId() ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Názov</label>
            <input type="text" name="title"
                   value="<?= $isEdit ? $parking->getTitle() : '' ?>"
                   class="form-control" required>
        </div>

        <?php if (!$isEdit): ?>
            <div class="mb-3">
                <label class="form-label">Počet miest</label>
                <input type="number" name="number_of_spots"
                       min="1" max="100"
                       class="form-control" required>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Fotka parkoviska</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <?php if ($isEdit && $parking->getPhoto()): ?>
            <div class="mb-3">
                <img src="/public/uploads/parkings/<?= $parking->getPhoto() ?>"
                     alt="Aktuálna fotka"
                     class="img-thumbnail"
                     style="max-width: 300px">
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Uložiť</button>
    </form>
</div>