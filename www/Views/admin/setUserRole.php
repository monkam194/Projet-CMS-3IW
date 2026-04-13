
<h1>Définir le rôle de cet utilisateur</h1>
<p>email : <?= h($user['email']) ;?></p>
<form method="POST" action="/admin/users/modify-user-role">
  <input type="hidden" name="email" value="<?= h($user['email']) ?>">
  <select name="role" id="role">
    <option value="ADMIN">Admin</option>
    <option value="EDITOR">Editor</option>
    <option value="USER">User</option>
  </select>
  <button type="submit">Nouveau rôle</button>
</form>