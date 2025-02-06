<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected ?int $id = null;
    protected string $username;
    protected string $password;

    public function getId(): ?int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public static function findByUsername(string $username): ?self
    {
        $users = self::getAll("username = ?", [$username]);
        return count($users) > 0 ? $users[0] : null;
    }
}