
<h1>Liste des pages:</h1>
<a href="/admin/new-page"> Créer une nouvelle page</a>
<table>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Slug</th>
    <th>Contenu</th>
  </tr>
    <?php foreach($pages as $page): ?>
      <tr>
        <td> <?= h($page['id']) ; ?> </td>
        <td> <?= h($page['title']) ; ?> </td>
        <td> <?= h($page['slug']) ; ?> </td>
        <td> <?= mb_substr($page['content'], 0, 10) . '...'; ?> </td>
        <td>
          <a href="/<?= h($page['slug']) ; ?>">Voir</a> 
          <a href="/admin/update-page-view?slug=<?= h($page['slug']) ; ?>">Modifier</a> 
          <a href="/admin/delete-page?id=<?= h($page['id']) ; ?>">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
</table>