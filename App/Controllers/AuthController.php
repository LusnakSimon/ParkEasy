<?php
namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\User;


class AuthController extends AControllerBase
{
    public function authorize(string $action): bool
    {
        return true;
    }

    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    public function login(): Response
    {
        return $this->html();
    }

    public function register(): Response
    {
        return $this->html();
    }

    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url('home.index'));
    }

    public function processLogin(): JsonResponse
    {
        $data = $this->request()->getRawBodyJSON();
        $username = $data->username ?? '';
        $password = $data->password ?? '';

        if ($this->app->getAuth()->login($username, $password)) {
            return $this->json(['success' => true]);
        }

        return $this->json(['success' => false, 'message' => 'Nesprávne prihlasovacie údaje']);
    }

    public function processRegister(): JsonResponse
    {
        $data = $this->request()->getRawBodyJSON();
        $username = $data->username ?? '';
        $password = $data->password ?? '';
        $confirmPassword = $data->confirmPassword ?? '';

        // Validácia vstupov
        if (empty($username) || empty($password)) {
            return $this->json(['success' => false, 'message' => 'Vyplňte všetky polia']);
        }

        if ($password !== $confirmPassword) {
            return $this->json(['success' => false, 'message' => 'Heslá sa nezhodujú']);
        }


        if (!$this->validateInput($username, 'username') || !$this->validateInput($password, 'password')) {
            return $this->json(['status' => 'error', 'message' => 'Nesprávny formát username alebo password']);
        }


        if (User::findByUsername($username)) {
            return $this->json(['success' => false, 'message' => 'Používateľské meno už existuje']);
        }

        // Vytvorenie nového používateľa
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->save();

        return $this->json(['success' => true]);
    }

    /*
     * username:
        Musí obsahovať iba písmená (A-Z, a-z), číslice (0-9) a podčiarkovník (_).
        Dĺžka musí byť medzi 3 a 50 znakmi.

      password:
        Musí obsahovať aspoň jedno písmeno (A-Z, a-z) a aspoň jednu číslicu (0-9).
        Môže obsahovať písmená, číslice a špeciálne znaky ako $, @, !, %, *, ?, &.
        Dĺžka musí byť minimálne 8 znakov.
     *
     * */
    private function validateInput(string $input, string $type): bool
    {
        $options = match ($type) {
            'username' => ['options' => ['regexp' => '/^[A-Za-z0-9_]{3,50}$/']],
            'password' => ['options' => ['regexp' => '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/']],
            default => [],
        };
        return filter_var($input, FILTER_VALIDATE_REGEXP, $options) !== false;
    }
}