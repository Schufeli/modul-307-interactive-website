<?php

class Customer 
{
    public int $id;
    public string $name;
    public string $email;
    public string $phone;
    public string $created;
    public bool $completed;
    public int $risklevelId;
    public int $mortgageId;

    public function __construct(int $id, string $name, string $email, string $phone, string $created, bool $completed, int $risklevelId, int $mortgageId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->created = $created;
        $this->completed = $completed;
        $this->risklevelId = $risklevelId;
        $this->mortgageId = $mortgageId;
    }

    // Fetch single Customer by Id
    public static function getById(int $id)
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM customers WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();

		if (!$result) {
			return null;
		}

		return new self(
            $result['id'], 
            $result['name'],
            $result['email'],
            $result['phone'],
            $result['created'],
            $result['completed'],
            $result['fk_risklevelId'],
            $result['fk_mortgageId']
        );
    }

    // Fetch all Customers
    public static function getAll() 
    {
        $statement = Database::getInstance()->getConnection()->prepare('SELECT * FROM customers WHERE completed NOT LIKE 1');
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $customers = [];

        foreach ($result as $object) {
            array_push($customers,
                new Customer(
                    $object['id'],
                    $object['name'],
                    $object['email'],
                    $object['phone'],
                    $object['created'],
                    $object['completed'],
                    $object['fk_risklevelId'],
                    $object['fk_mortgageId']
                )
            );
        }

        return $customers;
    }

    // Create new Customer
    public function create() {
        $date = date("Y-m-d");
        $statement = Database::getInstance()->getConnection()->prepare(
            'INSERT INTO `customers` (name, email, phone, created, fk_risklevelId, fk_mortgageId) 
             VALUES (:name, :email, :phone, :created, :risklevelId, :mortgageId)'
        );

        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':created', $date);
        $statement->bindParam(':risklevelId', $this->risklevelId);
        $statement->bindParam(':mortgageId', $this->mortgageId);

        $statement->execute();
    }

    // Update existing Customer
    public function update()
    {
        $statement = Database::getInstance()->getConnection()->prepare(
            'UPDATE `customers` SET name = :name, email = :email, phone = :phone, fk_risklevelId = :risklevelId, fk_mortgageId = _risklevelId 
             WHERE id = :id'
        );

        $statement->bindParam(':id', $this->id);
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':risklevelId', $this->risklevelId);
        $statement->bindParam(':mortgageId', $this->mortgageId);

        $statement->execute();
    }

    // Remove existing Customer
    public static function remove(int $id)
    {
        $statement = Database::getInstance()->getConnection()->prepare(
            'UPDATE `customers` SET completed = 1 WHERE id = :id'
        );

        $statement->bindParam(':id', $id);

        $statement->execute();
    }


}