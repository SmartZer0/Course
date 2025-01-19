<?php
namespace Project\Models;
use Core\Model;

class Result extends Model
{
    public function getAllResultsByUserId($userId)
    {
        return $this->findMany("SELECT * FROM results WHERE user_id = ?", [$userId]);
    }

    public function addResult($userId, $testId, $score)
    {
        $save_user_id = intval($userId);
        $save_test_id = intval($testId);
        $save_score = intval($score);
        return $this->addOne("INSERT INTO results (user_id, test_id, score) VALUES (?, ?, ?)", [$save_user_id, $save_test_id, $save_score]);
    }
}
