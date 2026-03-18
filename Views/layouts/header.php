<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon CMS' ?></title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #222;
        }

        header {
            background: #1f2937;
            color: white;
            padding: 16px 32px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 32px auto;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input, textarea, select, button {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .actions {
            display: flex;
            gap: 12px;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <div>
            <a href="/">Mon CMS</a>
        </div>
        <div>
            <a href="/">Accueil</a>
            <a href="/page/create">Créer une page</a>
            <a href="/login">Connexion</a>
        </div>
    </nav>
</header>
<div class="container">