<?php

class Mortgage 
{
    public int $id;
    public string $package;

    public function __construct(int $id, string $package) 
    {
        $this->id = $id;
        $this->package = $package;
    }

    // Fetch single Mortgage by Id
    public static function getById(int $id)
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM mortgages WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();

		if (!$result) {
			return null;
		}

		return $result;
    }

    // Fetch all Mortgages
    public static function getAll() 
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM mortgages');
        $statement->execute();

        $result = $statement->fetchAll();

        if (!$result) {
            return null;
        }

        return $result;
    }
}