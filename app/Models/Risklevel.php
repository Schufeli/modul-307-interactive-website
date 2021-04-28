<?php

class Risklevel 
{
    public int $id;
    public string $name;
    public int $duration;

    public function __construct(int $id, string $name, int $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }

    // Fetch single Risklevel by Id
    public static function getById(int $id)
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM risklevels WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();

		if (!$result) {
			return null;
		}

		return $result;
    }

    // Fetch all Risklevels
    public static function getAll() 
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM risklevels');
        $statement->execute();

        $result = $statement->fetchAll();

        if (!$result) {
            return null;
        }

        return $result;
    }
}