<?php
namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class ProfileController extends AControllerBase
{
    public function authorize(string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(): Response
    {
        return $this->html();
    }

    public function save(): Response
    {
        $user = $this->app->getAuth()->getLoggedUserContext();
        $new_password = $this->request()->getValue('new_password');
        $confirm_password = $this->request()->getValue('confirm_password');

        if ($new_password && $new_password === $confirm_password) {
            $user->setPassword($new_password);
            $user->save();
        }

        return $this->redirect('?c=profile');
    }

    public function delete(): Response
    {
        $user = $this->app->getAuth()->getLoggedUserContext();
        $user->delete();
        $this->app->getAuth()->logout();
        return $this->redirect('?c=home');
    }
}