document.addEventListener('DOMContentLoaded', () => {
    // Spracovanie prihlásenia
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            const response = await fetch('?c=auth&a=processLogin', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username, password })
            });

            const result = await response.json();
            const messageDiv = document.getElementById('loginMessage');

            if (result.success) {
                window.location.href = '?c=home';
            } else {
                messageDiv.innerHTML = `<div class="alert alert-danger">${result.message}</div>`;
            }
        });
    }

    // Spracovanie registrácie
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('registerUsername').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;

            const response = await fetch('?c=auth&a=processRegister', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    username,
                    password,
                    confirmPassword
                })
            });

            const result = await response.json();
            const messageDiv = document.getElementById('registerMessage');

            if (result.success) {
                messageDiv.innerHTML = `<div class="alert alert-success">Registrácia úspešná! Môžete sa prihlásiť</div>`;
                setTimeout(() => {
                    window.location.href = '?c=auth&a=login';
                }, 1500);
            } else {
                messageDiv.innerHTML = `<div class="alert alert-danger">${result.message}</div>`;
            }
        });
    }
});