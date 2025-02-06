<?php

$layout = 'auth';
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrácia</h4>
                </div>
                <div class="card-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Používateľské meno</label>
                            <input type="text" class="form-control" id="registerUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo</label>
                            <input type="password" class="form-control" id="registerPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Potvrdenie hesla</label>
                            <input type="password" class="form-control" id="registerConfirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Vytvoriť účet</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="<?= $link->url('auth.login') ?>" class="text-decoration-none">Už máte účet? Prihláste sa</a>
                    </div>
                    <div id="registerMessage" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
