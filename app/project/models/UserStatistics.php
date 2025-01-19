<?php
namespace Project\Models;
use Core\Model;

class UserStatistics extends Model
{
    public function addStatistics($userId, $courseId, $testId, $testResult)
    {
        $save_user_id = intval($userId);
        $save_course_id = intval($courseId);
        $save_test_id = intval($testId);
        $save_test_result = intval($testResult);

        // Получаем тему для теста (если topic пустое, используем название теста)
        $testTopic = $this->getTestTopicByTestId($save_test_id);

        // Записываем статистику в базу
        return $this->addOne(
            "INSERT INTO user_statistics (user_id, course_id, topic, test_result, test_id) VALUES (?, ?, ?, ?, ?)",
            [$save_user_id, $save_course_id, $testTopic, $save_test_result, $save_test_id]
        );
    }

    // Метод для получения topic по test_id из таблицы tests
    // Метод для получения темы теста
    public function getTestTopicByTestId($testId)
    {
        $test = $this->findOne("SELECT title, topic FROM tests WHERE test_id = ?", [$testId]);

        // Если тема пустая, используем название теста как тему
        return $test['topic'] ?? $test['title'] ?? 'Неизвестная тема';
    }

    // Метод для получения title (названия теста) по test_id из таблицы tests
    public function getTestTitleByTestId($testId)
    {
        $test = $this->findOne("SELECT title FROM tests WHERE test_id = ?", [$testId]);
        return $test['title'] ?? 'Без названия';
    }

    public function getStatisticsById($statId)
    {
        return $this->findOne("SELECT * FROM user_statistics WHERE stat_id = ?", [$statId]);
    }

    public function getStatisticsByUserId($userId)
    {
        return $this->findMany("SELECT * FROM user_statistics WHERE user_id = ?", [$userId]);
    }

    public function getStatisticsWithCourseByUserId($userId)
    {
        // Пример SQL запроса с JOIN
        return $this->findMany(
            "SELECT us.*, c.course_name AS course
            FROM user_statistics us
            LEFT JOIN courses c ON us.course_id = c.course_id
            WHERE us.user_id = ?",
            [$userId]
        );
    }

    public function getStatisticsWithCourseAndTopicByUserId($userId)
    {
        $sql = "
    SELECT 
        us.stat_id,
        us.user_id,
        us.course_id,
        c.course_name AS course,  -- Название курса из таблицы courses
        us.topic AS topic,         -- Название теста из таблицы tests
        us.test_result,          -- Результат теста из user_statistics
        us.completion_date       -- Дата завершения из user_statistics
    FROM 
        user_statistics us
    LEFT JOIN 
        courses c ON us.course_id = c.course_id
    WHERE 
        us.user_id = ?
    ORDER BY 
        us.completion_date DESC
    ";
        return $this->findMany($sql, [$userId]);
    }

    public function updateStatistics($userId, $courseId, $testId, $score)
    {
        $save_user_id = intval($userId);
        $save_course_id = intval($courseId);
        $save_test_id = intval($testId);
        $save_score = intval($score);

        // Получаем title из таблицы questions
        $testTitle = $this->getTestTitleByTestId($save_test_id);
        if (!$testTitle) {
            $testTitle = 'Неизвестный тест'; // Значение по умолчанию
        }

        return $this->addOne(
            "INSERT INTO user_statistics (user_id, course_id, topic, test_result) VALUES (?, ?, ?, ?)",
            [$save_user_id, $save_course_id, $testTitle, $save_score]
        );
    }


}
