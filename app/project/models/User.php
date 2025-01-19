<?php
namespace Project\Models;
use Core\Model;

class User extends Model
{
    public function getUserByEmailAndPassword($email, $password)
    {
        $save_email = $this->getSave($email);
        $save_password = $this->getSave($password); // Рекомендуется хешировать пароль перед сохранением
        return $this->findOne("SELECT * FROM users WHERE email = ? AND password = ?", [$save_email, $save_password]);
    }

    public function addUser($firstName, $lastName, $email, $password, $role)
    {
        $save_first_name = $this->getSave($firstName);
        $save_last_name = $this->getSave($lastName);
        $save_email = $this->getSave($email);
        $save_password = $this->getSave($password); // Рекомендуется хешировать пароль перед сохранением
        $save_role = $this->getSave($role);
        $result = $this->addOne("INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)", [$save_first_name, $save_last_name, $save_email, $save_password, $save_role]);
        if (!$result) {
            $errorInfo = self::$link->errorInfo();
            error_log("Database error: " . $errorInfo[2]);
            return false;
        }

        return ['user_id' => $this->getId()];
    }

    public function getUserById($userId)
    {
        return $this->findOne("SELECT * FROM users WHERE user_id = ?", [$userId]);
    }

    public function getAllUsers()
    {
        return $this->findMany("SELECT * FROM users");
    }
}
