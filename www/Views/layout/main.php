<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($title ?? 'Mini CMS') ?></title>
</head>
<body>
    <?php require __DIR__ . '/header.php'; ?>

    <main>
        <?php require $viewPath; ?>
    </main>

    <?php require __DIR__ . '/footer.php'; ?>
</body>
</html>