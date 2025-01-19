<!-- views/courses/index.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Курсы</title>
    <style>
        .course {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            transition: box-shadow 0.3s ease;
        }

        .course:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .course h3 {
            margin-top: 0;
        }

        .course ul {
            list-style-type: none;
            padding: 0;
        }

        .course ul li {
            margin-bottom: 5px;
        }

        .course ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .course ul li a:hover {
            color: #00FA9A;
            transform: scale(5.55);
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
            <h2>Курсы и Тесты</h2>
            <?php foreach ($data['courses'] as $course): ?>
                <div class="course">
                    <h3><?= htmlspecialchars($course['course_name'] ?? '') ?></h3>
                    <p><?= htmlspecialchars($course['description'] ?? '') ?></p>
                    <h4>Тесты:</h4>
                    <ul>
                        <?php if (isset($data['testsByCourse'][$course['course_id']])): ?>
                            <?php foreach ($data['testsByCourse'][$course['course_id']] as $test): ?>
                                <li>
                                    <!--<span class="test-id"> (ID: <?= htmlspecialchars($test['test_id']) ?>)</span> -->
                                    <a
                                        href="/test/<?= htmlspecialchars($test['test_id']) ?>"><?= htmlspecialchars($test['title'] ?? '') ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Нет доступных тестов для этого курса.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
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