<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

class Authenticator implements IAuthenticator
{

    /**
     * @inheritDoc
     */
    private const SESSION_USER_KEY = 'logged_user';

    public function __construct()
    {
        session_start();
    }

    public function login($login, $password): bool
    {
        $user = User::findByUsername($login);

        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION[self::SESSION_USER_KEY] = [
                'id' => $user->getId(),
                'username' => $user->getUsername()
            ];
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        unset($_SESSION[self::SESSION_USER_KEY]);
    }

    public function getLoggedUserName(): string
    {
        return $_SESSION[self::SESSION_USER_KEY]['username'] ?? '';
    }

    public function getLoggedUserId(): mixed
    {
        return $_SESSION[self::SESSION_USER_KEY]['id'] ?? null;
    }

    public function getLoggedUserContext(): mixed
    {
        $id = $this->getLoggedUserId();
        return $id ? User::getOne($id) : null;
    }

    public function isLogged(): bool
    {
        return isset($_SESSION[self::SESSION_USER_KEY]);
    }
}