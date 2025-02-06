<div class="container mt-4">
    <h2>Môj profil</h2>
    <form method="post" action="?c=profile&a=save">
        <div class="mb-3">
            <label>Nové heslo</label>
            <input type="password" name="new_password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Potvrdenie hesla</label>
            <input type="password" name="confirm_password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
        <a href="?c=profile&a=delete"
           class="btn btn-danger"
           onclick="return confirm('Naozaj chcete vymazať účet?')">
            Vymazať účet
        </a>
    </form>
</div>