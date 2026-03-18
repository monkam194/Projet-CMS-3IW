<div class="card">
    <h1>Modifier une page</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="/page/update?id=<?= urlencode($page['id']) ?>" method="POST">
        <div>
            <label for="title">Titre</label>
            <input
                type="text"
                id="title"
                name="title"
                value="<?= htmlspecialchars($page['title'] ?? '') ?>"
                required
            >
        </div>

        <div>
            <label for="slug">Slug</label>
            <input
                type="text"
                id="slug"
                name="slug"
                value="<?= htmlspecialchars($page['slug'] ?? '') ?>"
                required
            >
        </div>

        <div>
            <label for="content">Contenu</label>
            <textarea
                id="content"
                name="content"
                required
            ><?= htmlspecialchars($page['content'] ?? '') ?></textarea>
        </div>

        <div>
            <label for="status">Statut</label>
            <select id="status" name="status" required>
                <option value="draft" <?= (($page['status'] ?? '') === 'draft') ? 'selected' : '' ?>>
                    Brouillon
                </option>
                <option value="published" <?= (($page['status'] ?? '') === 'published') ? 'selected' : '' ?>>
                    Publiée
                </option>
            </select>
        </div>

        <div class="actions">
            <button type="submit">Enregistrer</button>
            <a href="/" style="padding:12px 16px;background:#6b7280;color:white;border-radius:8px;text-decoration:none;">Annuler</a>
        </div>
    </form>
</div>