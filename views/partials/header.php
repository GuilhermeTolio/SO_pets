<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistema ONG Pets' ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🐾</text></svg>">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                🐾 ONG Pets
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Início</a></li>
                <li><a href="index.php?controller=pet&action=index">Pets</a></li>
                <li><a href="index.php?controller=usuario&action=index">Usuários</a></li>
                <li><a href="index.php?controller=doacao&action=index">Doações</a></li>
            </ul>
        </nav>
    </header>
