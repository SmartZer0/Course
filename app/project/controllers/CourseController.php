<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\Course;
use Project\Models\Test;

class CourseController extends Controller
{
    protected string $title;

    public function index()
    {
        $courseModel = new Course();
        $courses = $courseModel->getAllCourses();

        $testModel = new Test();
        $allTests = $testModel->getAllTests();

        // Группируем тесты по курсам
        $testsByCourse = [];
        foreach ($allTests as $test) {
            $courseId = $test['course_id'];
            $testsByCourse[$courseId][] = $test;
        }

        $this->title = 'Курсы и Тесты';
        return ['view' => 'courses/index', 'data' => ['courses' => $courses, 'testsByCourse' => $testsByCourse, 'title' => $this->title]];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
