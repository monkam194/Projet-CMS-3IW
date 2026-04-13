
<h1>Modifier mon article :</h1>
<form method="POST" action="/admin/update-page?slug=<?= h($page['slug']); ?>">
  <label>Titre</label>
  <input type="text" name="title" id="title" value="<?= h($page['title']); ?>" required>
  <br>
  <br>
  <label>Contenu :</label>
  <textarea name="content" id="content" required><?= h($page['content'])?></textarea>
  <br>
  <br>
  <label for="status">Séletctionnez le statut de l'article :</label>
  <select name="status" id="status">
    <option value="published" <?= $page['status'] == "published" ? "selected" : '' ?>>Publié</option>
    <option value="draft" <?= $page['status'] == "draft" ? "selected" : '' ?>>Brouillon</option>
  </select>
  <br>
  <br>
  <label for="author">Auteur :</label>
  <input type="text" name="author" id="author" value="<?= h($page['author']);?>">
  <br>
  <br>
  <button type="submit">Modifier</button>
</form>
<br>
<a href="/admin/pages">Retourner à la liste des pages</a>