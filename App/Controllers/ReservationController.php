<?php

namespace App\Controllers;

use App\Models\Reservation;
use App\Models\Parking;
use App\Core\AControllerBase;
use App\Core\Responses\Response;

class ReservationController extends AControllerBase {
    public function index(): Response {
        $reservations = Reservation::getAll();
        $parkings = Parking::getAll();
        return $this->html(['reservations' => $reservations, 'parkings' => $parkings]);
    }

    public function store(): Response {
        $name = $this->request()->getValue('name');
        $email = $this->request()->getValue('email');
        $date = $this->request()->getValue('date');
        $time = $this->request()->getValue('time');
        $spot_id = $this->request()->getValue('spot');

        if (strlen($name) < 3 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->html(['error' => 'Neplatné meno alebo e-mail.'], 'index');
        }

        if (strtotime($date) < strtotime(date('Y-m-d'))) {
            return $this->html(['error' => 'Dátum musí byť v budúcnosti.'], 'index');
        }

        $spot = Parking::getOne($spot_id);
        if (!$spot || $spot->getStatus() !== 'free') {
            return $this->html(['error' => 'Miesto je už rezervované alebo obsadené.'], 'index');
        }

        $reservation = new Reservation();
        $reservation->setName($name);
        $reservation->setEmail($email);
        $reservation->setDate($date);
        $reservation->setTime($time);
        $reservation->setSpotId($spot_id);
        $reservation->save();

        $spot->setStatus('reserved');
        $spot->save();

        return $this->redirect($this->url('reservation.index'));
    }


    public function delete(): Response {
        $id = $this->request()->getValue('id');
        $reservation = Reservation::getOne($id);
        if ($reservation) {
            $spot = Parking::getOne($reservation->getSpotId());
            $spot->setStatus('free');
            $spot->save();

            $reservation->delete();
        }
        return $this->redirect($this->url('reservation.index'));
    }

    public function edit(): Response {
        $id = $this->request()->getValue('id');
        $reservation = Reservation::getOne($id);


        $parkings = Parking::getAll();

        return $this->html(['reservation' => $reservation, 'parkings' => $parkings]);
    }

    public function update(): Response {

        $id = $this->request()->getValue('id');

        $reservation = Reservation::getOne($id);

        if (!$reservation) {
            return $this->redirect($this->url('reservation.index'));
        }

        $name = $this->request()->getValue('name');
        $email = $this->request()->getValue('email');
        $date = $this->request()->getValue('date');
        $time = $this->request()->getValue('time');
        $spot_id = $this->request()->getValue('spot');

        if (strlen($name) < 3 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->html(['error' => 'Neplatné meno alebo e-mail.'], 'edit');
        }

        if (strtotime($date) < strtotime(date('Y-m-d'))) {
            return $this->html(['error' => 'Dátum musí byť v budúcnosti.'], 'edit');
        }

        $reservation->setName($name);
        $reservation->setEmail($email);
        $reservation->setDate($date);
        $reservation->setTime($time);
        $reservation->save();

        return $this->redirect($this->url('reservation.index'));
    }

}
