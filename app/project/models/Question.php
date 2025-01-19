<?php
namespace Project\Models;

use Core\Model;

class Question extends Model
{
    public function addQuestion($testId, $questionText, $correctAnswer)
    {
        $save_test_id = intval($testId);
        $save_question_text = $this->getSave($questionText);
        $save_correct_answer = $this->getSave($correctAnswer);
        return $this->addOne(
            "INSERT INTO questions (test_id, question_text, correct_answer) VALUES (?, ?, ?)",
            [$save_test_id, $save_question_text, $save_correct_answer]
        );
    }

    public function getAllQuestionsByTestId($testId)
    {
        return $this->findMany("SELECT * FROM questions WHERE test_id = ?", [intval($testId)]);
    }
}