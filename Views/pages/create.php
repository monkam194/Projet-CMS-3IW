<div class="card">
    <h1>Créer une page</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="/page/store" method="POST">
        <div>
            <label for="title">Titre</label>
            <input
                type="text"
                id="title"
                name="title"
                placeholder="Titre de la page"
                required
            >
        </div>

        <div>
            <label for="slug">Slug</label>
            <input
                type="text"
                id="slug"
                name="slug"
                placeholder="exemple-ma-page"
                required
            >
        </div>

        <div>
            <label for="content">Contenu</label>
            <textarea
                id="content"
                name="content"
                placeholder="Contenu de la page"
                required
            ></textarea>
        </div>

        <div>
            <label for="status">Statut</label>
            <select id="status" name="status" required>
                <option value="draft">Brouillon</option>
                <option value="published">Publiée</option>
            </select>
        </div>

        <button type="submit">Créer la page</button>
    </form>
</div>