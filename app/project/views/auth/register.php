<!-- views/auth/register.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Регистрация</title>
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
            <h2>Регистрация</h2>
            <?php if (isset($data['error'])): ?>
                <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
            <?php endif; ?>
            <form action="/auth/register/" method="post">
                <div class="form-group">
                    <label for="firstname">Имя:</label>
                    <input type="text" id="firstname" name="first_name" required />
                </div>

                <div class="form-group">
                    <label for="lastname">Фамилия:</label>
                    <input type="text" id="lastname" name="last_name" required />
                </div>

                <div class="form-group">
                    <label for="email">Почта:</label>
                    <input type="email" id="email" name="email" required />
                </div>

                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required />
                </div>

                <div class="form-group">
                    <label for="role">Роль:</label>
                    <select id="role" name="role" required>
                        <option value="Ученик">Ученик</option>
                        <option value="Преподаватель">Преподаватель</option>
                    </select>
                </div>

                <button type="submit">Зарегистрироваться</button>
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