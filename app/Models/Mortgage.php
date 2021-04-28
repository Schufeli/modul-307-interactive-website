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

		return new self (
            $result['id'],
            $result['package']
        );
    }

    // Fetch all Mortgages
    public static function getAll() 
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM mortgages');
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $mortgages = [];

        foreach ($result as $object) {
            array_push($mortgages,
                new Mortgage(
                    $object['id'],
                    $object['package'],
                )
            );
        }

        return $mortgages;
    }
}