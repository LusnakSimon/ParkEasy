<?php
namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Parking;

class HomeController extends AControllerBase
{
    public function index(): Response
    {
        $parkings = Parking::getAll();
        return $this->html(['parkings' => $parkings]);
    }
}