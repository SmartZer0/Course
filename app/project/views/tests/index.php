<!-- views/tests/index.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Темы тестов</title>
    <style>
        .test {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .test h2 {
            margin-top: 0;
        }
    </style>
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
            <h2><?= htmlspecialchars($data['test']['title']) ?></h2>
            <form method="post" action="/submit_test/<?= htmlspecialchars($data['test']['test_id']) ?>">
                <input type="hidden" name="testId" value="<?= htmlspecialchars($data['test']['test_id']) ?>">
                <?php foreach ($data['questions'] as $question): ?>
                    <div class="question">
                        <p><?= htmlspecialchars($question['question_text'] ?? '') ?></p>
                        <input type="text" name="answer_<?= $question['question_id'] ?>" placeholder="Ваш ответ" required>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Завершить тест</button>
            </form>
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