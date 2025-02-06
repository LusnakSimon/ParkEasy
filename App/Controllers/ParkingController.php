<?php
namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Parking;
use App\Models\Spot;

class ParkingController extends AControllerBase
{
    public function authorize(string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(): Response
    {
        $user_id = $this->app->getAuth()->getLoggedUserId();
        $parkings = Parking::getAll("user_id = ?", [$user_id]);
        return $this->html(['parkings' => $parkings]);
    }

    public function create(): Response
    {
        return $this->html();
    }

    public function edit(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $parking = Parking::getOne($id);

        // Kontrola vlastníctva
        if ($parking->getUserId() !== $this->app->getAuth()->getLoggedUserId()) {
            return $this->redirect('?c=parking');
        }

        return $this->html(['parking' => $parking]);
    }

    public function delete(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $parking = Parking::getOne($id);

        if ($parking && $parking->getUserId() === $this->app->getAuth()->getLoggedUserId()) {
            // Zmazať všetky miesta a rezervácie
            Spot::deleteAll("parking_id = ?", [$id]);
            $parking->delete();
        }

        return $this->redirect('?c=parking');
    }

    public function save(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $isEdit = ($id > 0);

        // Validácia
        $title = $this->request()->getValue('title');
        $number_of_spots = (int)$this->request()->getValue('number_of_spots');

        if (empty($title) || $number_of_spots < 1) {
            return $this->redirect('?c=parking&a=create');
        }

        // Spracovanie fotky
        $files = $this->request()->getFiles();
        $photo = $files['photo'] ?? null;
        $photoName = null;

        if ($photo->isValid()) {
            $targetDir = "public/uploads/parkings/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $photoName = time() . '_' . $photo->getName();
            $photo->save($targetDir . $photoName);
        }

        // Uloženie parkoviska
        $parking = $isEdit ? Parking::getOne($id) : new Parking();

        if ($isEdit && $parking->getUserId() !== $this->app->getAuth()->getLoggedUserId()) {
            return $this->redirect('?c=parking');
        }

        $parking->setTitle($title);
        $parking->setUserId($this->app->getAuth()->getLoggedUserId());

        if ($photoName) {
            $parking->setPhoto($photoName);
        }

        if (!$isEdit) {
            $parking->setNumberOfSpots($number_of_spots);
            $parking->save();

            // Vytvorenie parkovacých miest
            for ($i = 1; $i <= $number_of_spots; $i++) {
                $spot = new Spot();
                $spot->setParkingId($parking->getId());
                $spot->setSpotNumber($i);
                $spot->save();
            }
        } else {
            $parking->save();
        }

        return $this->redirect('?c=parking');
    }
}