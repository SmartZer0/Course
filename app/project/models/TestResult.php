<?php
namespace Project\Models;
use Core\Model;

class TestResult extends Model
{
    public function getResultsByUserId($userId)
    {
        return $this->findMany("SELECT t.name as test_name, tr.score FROM test_results tr JOIN tests t ON tr.test_id = t.test_id WHERE tr.user_id = ?", [$userId]);
    }
}
