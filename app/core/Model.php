<?php
namespace Core;

class Model
{
	protected static $link;

	public function __construct()
	{
		if (self::$link === null) {
			try {
				self::$link = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
				self::$link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch (\PDOException $e) {
				error_log("Database connection failed: " . $e->getMessage());
				die("Database connection failed: " . $e->getMessage());
			}
		}
	}

	protected function getSave($value)
	{
		if (is_array($value)) {
			// Преобразуем массив в JSON-строку для корректной обработки
			return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		}
		return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
	}

	protected function findOne($sql, $params = [])
	{
		$stmt = self::$link->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	protected function findMany($sql, $params = [])
	{
		$stmt = self::$link->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	protected function addOne($sql, $params = [])
	{
		$stmt = self::$link->prepare($sql);
		$stmt->execute($params);
		return self::$link->lastInsertId();
	}

	protected function getId()
	{
		$lastInsertId = self::$link->lastInsertId();
		return $lastInsertId !== false ? (string) $lastInsertId : '';
	}
}