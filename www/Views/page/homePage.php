<h1>Page d'acceuil</h1> <br>

<?php if(isset($_SESSION['user'])): ?>
  <a href="/logout">Déconnexion</a>
<?php endif; ?>

<?php if(!isset($_SESSION['user'])): ?>
  <a href='/login'>Connexion</a> <br>
  <a href='/signup'>Inscription</a>
<?php endif; ?>
