
<h1>Créer une nouvelle page</h1>
<form method="POST" action="/admin/create-new-page">
  <input type="text" name="title" id="title" placeholder="Titre" required>
  <br>
  <br>
  <textarea name="content" id="content" placeholder="Contenu de l'article"></textarea>
  <br>
  <br>
  <label for="status">Séletctionnez le statut de l'article:</label>
  <select name="status" id="status">
    <option value="published">Publié</option>
    <option value="draft">Brouillon</option>
  </select>
  <br>
  <br>
  <label for="author">Nom de l'auteur :</label>
  <input type="text" name="author" id="author" value="<?= h(explode("@", $_SESSION['user']['email'])[0]) ?>">
  <br>
  <br>
  <button type="submit">Créer le nouvel article</button>
</form>