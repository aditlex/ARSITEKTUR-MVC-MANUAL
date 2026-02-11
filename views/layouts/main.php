<!-- views/layouts/main.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Aplikasi PHP Saya' ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        nav {
            background: #333;
            color: white;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 5px;
        }
        nav a {
            color: white;
            margin-right: 1rem;
            text-decoration: none;
        }
        nav a:hover { text-decoration: underline; }
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .features {
            background: #f4f4f4;
            padding: 2rem;
            border-radius: 5px;
        }
        footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #ccc;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Beranda</a>
        <a href="/about">Tentang</a>
        <a href="/users">Pengguna</a>
        <a href="/contact">Kontak</a>
    </nav>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Aplikasi PHP Saya. Semua hak dilindungi.</p>
    </footer>
</body>
</html>