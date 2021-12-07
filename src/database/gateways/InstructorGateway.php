<?php
namespace src\database\gateways;

use PDO;
use src\core\Database;

class InstructorGateway 
{
    private Database $db;
    private PDO $pdo;


    public function __construct()
    {
        $this->db = new Database();
        $this->pdo = $this->db->getConnection();
    }

    public function findAll()
    {
        try {
            $sth = $this->pdo->prepare(
                'SELECT id, name, email, cpf
                 FROM instructor'
            );
        
            // $sth->bindValue(':table', $table, PDO::PARAM_STR);
            $sth->execute();
    
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
    
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    
    }

    public function findById(int $id) 
    {
        $sth = $this->pdo->prepare(
            'SELECT 
                id, name, email, cpf
            FROM
                instructor
            WHERE id = :id'
        );

        try {
            $sth->bindValue(':id', $id, PDO::PARAM_INT);   
            $sth->execute();

            $result = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    
    public function insert(object $instructor)
    {

        $sth = $this->pdo->prepare(
            'INSERT INTO instructor 
                    (name, email, cpf)
                VALUES
                    (:name, :email, :cpf);'
        );

        try {

            $sth->bindValue(':name', $instructor->name, PDO::PARAM_STR);   
            $sth->bindValue(':email', $instructor->email, PDO::PARAM_STR);   
            $sth->bindValue(':cpf', $instructor->cpf, PDO::PARAM_STR);   

            $sth->execute();

            return $sth->rowCount();

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function put(object $instructor)
    {
        $sth = $this->pdo->prepare(
            'UPDATE instructor
             SET 
                name = :name,
                email  = :email,
                cpf = :cpf
            WHERE id = :id;'
        );
            

        try {
            $sth->bindValue(':id', $instructor->id, PDO::PARAM_STR);   
            $sth->bindValue(':name', $instructor->name, PDO::PARAM_STR);   
            $sth->bindValue(':email', $instructor->email, PDO::PARAM_STR);   
            $sth->bindValue(':cpf', $instructor->cpf, PDO::PARAM_STR);   

            $sth->execute();

            return $sth->rowCount();

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function patch(object $instructor)
    {
        $sth = $this->pdo->prepare(
            'UPDATE instructor
             SET 
                name = :name,
                email  = :email,
                cpf = :cpf
            WHERE id = :id;'
        );
            

        try {

            $instructorById = $this->findById((int) $instructor->id);

            if ($instructorById) {

                $currentInstructor = (object) $instructorById[0];

                $sth->bindValue(':id', $instructor->id);

                $instructor->name ? $sth->bindValue(':name', $instructor->name, PDO::PARAM_STR) : $sth->bindValue(':name', $currentInstructor->name, PDO::PARAM_STR);
                $instructor->email ? $sth->bindValue(':email', $instructor->email, PDO::PARAM_STR) : $sth->bindValue(':email', $currentInstructor->email, PDO::PARAM_STR);
                $instructor->cpf ? $sth->bindValue(':cpf', $instructor->cpf, PDO::PARAM_STR) : $sth->bindValue(':cpf', $currentInstructor->cpf, PDO::PARAM_STR);

                $sth->execute();

                return $this->findById((int) $instructor->id);
            }

            return null;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

}
