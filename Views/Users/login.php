<div class="card">
    <h1>Connexion</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="/login" method="POST">
        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Votre email"
                required
            >
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Votre mot de passe"
                required
            >
        </div>

        <button type="submit">Se connecter</button>
    </form>
</div>