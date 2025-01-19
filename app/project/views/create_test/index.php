<!-- views/create_test/index.php -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/project/webroot/style.css" />
    <title>Создать тест</title>
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
            <h2>Создание теста</h2>
            <form action="/create_test/create" method="post">
                <label for="course_id">Курс:</label>
                <select name="course_id" id="course_id" required>
                    <?php foreach ($data['courses'] as $course): ?>
                        <option value="<?= htmlspecialchars($course['course_id']) ?>">
                            <?= htmlspecialchars($course['course_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for="title">Название теста:</label>
                <input type="text" name="title" id="title" required>
                <br>
                <label for="description">Описание теста:</label>
                <textarea name="description" id="description"></textarea>
                <br>
                <h3>Вопросы:</h3>
                <div id="questions">
                    <div class="question">
                        <label for="question_text_1">Вопрос 1:</label>
                        <textarea name="question_text[]" id="question_text_1" required></textarea>
                        <br>
                        <label for="correct_answer_1">Правильный ответ:</label>
                        <textarea name="correct_answer[]" id="correct_answer_1" required></textarea>
                        <br>
                    </div>
                </div>
                <button type="button" onclick="addQuestion()">Добавить вопрос</button>
                <br>
                <button type="submit">Создать тест</button>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>2024 Курсы для онлайн-обучения.</p>
            <p>Разработано Наркунас Виталий ИКБО-13-22.</p>
        </div>
    </footer>

    <script>
        let questionCount = 1;

        function addQuestion() {
            questionCount++;
            const questionDiv = document.createElement('div');
            questionDiv.classList.add('question');
            questionDiv.innerHTML = `
                <label for="question_text_${questionCount}">Вопрос ${questionCount}:</label>
                <textarea name="question_text[]" id="question_text_${questionCount}" required></textarea>
                <br>
                <label for="correct_answer_${questionCount}">Правильный ответ:</label>
                <textarea name="correct_answer[]" id="correct_answer_${questionCount}" required></textarea>
                <br>
            `;
            document.getElementById('questions').appendChild(questionDiv);
        }
    </script>
</body>

</html>