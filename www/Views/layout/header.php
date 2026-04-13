<nav>
    <a href="/">Accueil</a>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="/login">Connexion</a>
        <a href="/signup">Inscription</a>
    <?php else: ?>
        <a href="/admin/pages">Pages</a>
        <a href="/admin/users">Utilisateurs</a>
        <a href="/logout">Déconnexion</a>
    <?php endif; ?>
</nav>
<hr>