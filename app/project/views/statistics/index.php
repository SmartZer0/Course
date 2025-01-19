<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Статистика</title>
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
            <h2>Статистика</h2>
            <h3>Курсы и результаты тестов</h3>
            <table>
                <thead>
                    <tr>
                        <th>Курс</th>
                        <th>Тема</th>
                        <th>Результат теста</th>
                        <th>Дата прохождения</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['statistics'] as $stat): ?>
                        <tr>
                            <td><?= htmlspecialchars($stat['course'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($stat['topic'] ?? 'Неизвестная тема', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($stat['test_result'], ENT_QUOTES, 'UTF-8') ?>%</td>
                            <td><?= htmlspecialchars($stat['completion_date'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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