<?php
namespace Project\Models;
use Core\Model;

class UserAnswer extends Model
{
    public function getAllAnswersByUserId($userId)
    {
        return $this->findMany("SELECT * FROM user_answers WHERE user_id = ?", [$userId]);
    }

    public function addUserAnswer($userId, $questionId, $answer)
    {
        $save_user_id = intval($userId);
        $save_question_id = intval($questionId);
        $save_answer = $this->getSave($answer);
        return $this->addOne("INSERT INTO user_answers (user_id, question_id, answer) VALUES (?, ?, ?)", [$save_user_id, $save_question_id, $save_answer]);
    }
    public function addAnswer($userId, $questionId, $answer)
    {
        $save_user_id = intval($userId);
        $save_question_id = intval($questionId);
        $save_answer = $this->getSave($answer);
        return $this->addOne("INSERT INTO user_answers (user_id, question_id, answer) VALUES (?, ?, ?)", [$save_user_id, $save_question_id, $save_answer]);
    }
}
