<?php

class MidtermDao
{

    private $conn;

    public function __construct()
    {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "midt-2022-v1";
            $port = 3306;

            //midterm database thing
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
            );

            $dsn = "mysql:host=$servername;port=$port;dbname=$dbname";

            $this->conn = new PDO($dsn, $username, $password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_investors()
    {
        $sql = "SELECT * FROM investors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_investor_by_id($id)
    {
        $sql = "SELECT * FROM investors WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add_transfer($entity)
    {
        $table_name = 'transfers';
        $query = "INSERT INTO " . $table_name . " (";
        foreach ($entity as $column => $value) {
            $query .= $column . ', ';
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($entity as $column => $value) {
            $query .= ":" . $column . ', ';
        }
        $query = substr($query, 0, -2);
        $query .= ")";


        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity);
        $entity['id'] = $this->conn->lastInsertId();

        return $entity;
    }

    public function get_transfers()
    {
        $sql = "select * 
        from transfers t
        join investors i on i.id = t.sender_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
