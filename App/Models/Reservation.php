<?php

namespace App\Models;

use App\Core\Model;

class Reservation extends Model {
    protected ?int $id = null;
    protected int $user_id;
    protected int $spot_id;
    protected string $time_from;
    protected string $time_to;

    public function getId(): ?int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function setUserId($user_id): void {
       $this->user_id = $user_id;
    }

    public function getTimeFrom(): string {
        return $this->time_from;
    }

    public function getTimeTo(): string {
        return $this->time_to;
    }

    public function getSpotId(): int {
        return $this->spot_id;
    }

    public function setTimeTo(string $time_to): void {
        $this->time_to = $time_to;
    }

    public function setTimeFrom(string $time_from): void {
        $this->time_from = $time_from;
    }

    public function setSpotId(int $spot_id): void {
        $this->spot_id = $spot_id;
    }
}
