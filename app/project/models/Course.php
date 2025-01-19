<?php
namespace Project\Models;

use Core\Model;

class Course extends Model
{
    public function getAllCourses()
    {
        return $this->findMany("SELECT * FROM courses");
    }

    public function getCourseById($id)
    {
        $result = $this->findOne("SELECT * FROM courses WHERE course_id = ?", [$id]);
        error_log("getCourseById result: " . print_r($result, true));
        return $result;
    }

    public function addCourse($courseName, $description)
    {
        $save_course_name = $this->getSave($courseName);
        $save_description = $this->getSave($description);
        $this->addOne("INSERT INTO courses (course_name, description) VALUES (?, ?)", [$save_course_name, $save_description]);
        return $this->getId(); // Возвращаем ID созданного курса
    }
}
