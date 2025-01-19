<?php
namespace Project\Models;

use Core\Model;

class Test extends Model
{
    public function addTest($courseId, $title, $description)
    {
        $save_course_id = intval($courseId);
        $save_title = $this->getSave($title);
        $save_description = $this->getSave($description);
        return $this->addOne(
            "INSERT INTO tests (course_id, title, description) VALUES (?, ?, ?)",
            [$save_course_id, $save_title, $save_description]
        );
    }

    public function getAllTests()
    {
        return $this->findMany("SELECT * FROM tests");
    }

    public function getTestById($testId)
    {
        return $this->findOne("SELECT * FROM tests WHERE test_id = ?", [intval($testId)]);
    }

    public function getTestsByCourseId($courseId)
    {
        return $this->findMany("SELECT * FROM tests WHERE course_id = ?", [intval($courseId)]);
    }
}