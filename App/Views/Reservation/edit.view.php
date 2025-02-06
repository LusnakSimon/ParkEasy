<?php

/** @var \App\Models\Reservation $data['reservation'] */
/** @var \App\Models\Parking[] $data['parkings'] */
/** @var \App\Core\LinkGenerator $link */


?>

<div class="container mt-4">
    <h2>Nova rezervácia</h2>
    <form method="post">
        <input type="hidden" name="spot_id" value="<?= $data['spot_id'] ?>">

        <div class="mb-3">
            <label>Čas od</label>
            <input type="datetime-local" name="time_from" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Čas do</label>
            <input type="datetime-local" name="time_to" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Rezervovať</button>
    </form>
</div>

