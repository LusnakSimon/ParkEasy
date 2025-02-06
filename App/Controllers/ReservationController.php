<?php
namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Reservation;
use App\Models\Spot;

class ReservationController extends AControllerBase
{
    public function authorize(string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(): Response
    {
        $user_id = $this->app->getAuth()->getLoggedUserId();
        $reservations = Reservation::getAll("user_id = ?", [$user_id]);
        return $this->html(['reservations' => $reservations]);
    }

    public function delete(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $reservation = Reservation::getOne($id);

        if ($reservation && $reservation->getUserId() === $this->app->getAuth()->getLoggedUserId()) {
            $reservation->delete();
        }

        return $this->redirect('?c=reservation');
    }

    public function create(): Response
    {
        $spot_id = (int)$this->request()->getValue('spot_id');
        return $this->html(['spot_id' => $spot_id]);
    }

    public function save(): Response
    {
        $spot_id = (int)$this->request()->getValue('spot_id');
        $time_from = $this->request()->getValue('time_from');
        $time_to = $this->request()->getValue('time_to');

        // Kontrola kolízie
        $conflicts = Reservation::getAll(
            "spot_id = ? AND ((time_from <= ? AND time_to >= ?) OR (time_from <= ? AND time_to >= ?))",
            [$spot_id, $time_to, $time_from, $time_from, $time_to]
        );

        if (empty($conflicts)) {
            $reservation = new Reservation();
            $reservation->setUserId($this->app->getAuth()->getLoggedUserId());
            $reservation->setSpotId($spot_id);
            $reservation->setTimeFrom($time_from);
            $reservation->setTimeTo($time_to);
            $reservation->save();
        }

        return $this->redirect('?c=home');
    }
}