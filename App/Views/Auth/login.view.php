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
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Prihlásenie</h4>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Používateľské meno</label>
                            <input type="text" class="form-control" id="loginUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Prihlásiť sa</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="<?= $link->url('auth.register') ?>" class="text-decoration-none">Ešte nemáte účet? Zaregistrujte sa</a>
                    </div>
                    <div id="loginMessage" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
