<!-- views/home.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Главная</title>
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
            <h2>Добро пожаловать на наш сайт!</h2>
            <p>
                Здесь вы можете найти курсы для онлайн-обучения и пройти тесты. Мы предлагаем широкий выбор курсов по
                различным темам, которые помогут вам расширить свои знания и навыки.
            </p>
            <p>
                Начните свое обучение прямо сейчас и откройте для себя новые возможности!
            </p>
            <br />
            <br />
            <h3>Почему выбирают нас?</h3>
            <ul>
                <li>Широкий выбор курсов</li>
                <li>Удобная платформа для обучения</li>
                <li>Поддержка и сопровождение на каждом этапе</li>
            </ul>

            <div class="motivation">
                <p class="quote">
                    "Успех — это не ключ к счастью. Счастье — это ключ к успеху. Если вы любите то, что вы делаете, вы
                    будете иметь успех." — Альберт Швейцер
                </p>
            </div>
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