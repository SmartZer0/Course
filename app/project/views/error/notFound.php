<!-- views/error/notFound.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Страница не найдена') ?></title>
</head>

<body>
    <h1><?= htmlspecialchars($title ?? 'Страница не найдена') ?></h1>
    <p>Страница, которую вы ищете, не найдена.</p>
</body>

</html>