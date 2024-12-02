<?php

namespace App\Models;

use App\Core\Model;

class Reservation extends Model {
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $email = null;
    protected ?string $date = null;
    protected ?string $time = null;
    protected ?int $spot_id = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getDate(): ?string {
        return $this->date;
    }

    public function getTime(): ?string {
        return $this->time;
    }

    public function getSpotId(): ?int {
        return $this->spot_id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }

    public function setTime(string $time): void {
        $this->time = $time;
    }

    public function setSpotId(int $spot_id): void {
        $this->spot_id = $spot_id;
    }
}
