<?php

namespace App\Models;

use App\Core\Model;

class Parking extends Model {
    protected ?int $id = null;
    protected ?int $spot_number = null;
    protected ?string $status = 'free';

    public function getId(): ?int {
        return $this->id;
    }

    public function getSpotNumber(): ?int {
        return $this->spot_number;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setSpotNumber(int $spot_number): void {
        $this->spot_number = $spot_number;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }
}
