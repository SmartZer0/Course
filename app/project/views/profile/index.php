<!-- views/profile/index.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Профиль</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">Онлайн Обучение</h1>
            <nav class="nav">
                <a href="/home/" class="nav-link">Главная</a>
                <a href="/profile/" class="nav-link">Профиль</a>
                <a href="/auth/login/" class="nav-link">Авторизация</a>
                <a href="/auth/register/" class="nav-link">Регистрация</a>
                <a href="/courses/" class="nav-link">Курсы</a>
                <a href="/auth/logout/" class="nav-link logout">Выход</a>
            </nav>
        </div>
    </header>

    <main class="content">
        <div class="container">
            <h2>Профиль</h2>
            <p>Имя: <?= htmlspecialchars($data['user']['first_name']) ?></p>
            <p>Фамилия: <?= htmlspecialchars($data['user']['last_name']) ?></p>
            <p>Почта: <?= htmlspecialchars($data['user']['email']) ?></p>
            <p>Роль: <?= htmlspecialchars($data['user']['role']) ?></p>
            <?php if ($data['user']['role'] === 'Преподаватель'): ?>
                <button onclick="location.href='/create_test'">Создать тест</button>
            <?php endif; ?>
            <button onclick="location.href='/statistics/'">
                Посмотреть статистику
            </button>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>2024 Курсы для онлайн-обучения.</p>
            <p>Разработано Наркунас Виталий ИКБО-13-22.</p>
        </div>
    </footer>
</body>

</html>