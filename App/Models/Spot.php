<?php
namespace App\Models;

use App\Core\Model;

class Spot extends Model {
    protected ?int $id = null;
    protected int $parking_id;
    protected int $spot_number;

    public function getId(): ?int {
        return $this->id;
    }
    public function getParkingId(): int {
        return $this->parking_id;
    }
    public function setParkingId(int $parkingId): void {
        $this->parking_id = $parkingId;
    }
    public function getSpotNumber(): int {
        return $this->spot_number;
    }
    public function setSpotNumber(int $number): void {
        $this->spot_number = $number;
    }
}