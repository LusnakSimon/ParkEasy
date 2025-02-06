<?php
namespace App\Models;

use App\Core\Model;

class Parking extends Model {
    protected ?int $id = null;
    protected int $user_id;
    protected string $title;
    protected int $number_of_spots;
    protected ?string $photo = null;


    public function getId(): ?int {
        return $this->id;
    }
    public function getUserId(): int {
        return $this->user_id;
    }
    public function setUserId(int $userId): void {
        $this->user_id = $userId;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getNumberOfSpots(): int {
        return $this->number_of_spots;
    }

    public function setNumberOfSpots(int $number_of_spots): void {
        $this->number_of_spots = $number_of_spots;
    }
    public function getPhoto(): ?string {
        return $this->photo;
    }
    public function setPhoto(?string $photo): void {
        $this->photo = $photo;
    }
}