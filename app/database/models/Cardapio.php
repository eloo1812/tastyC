<?php 
namespace app\database\models;

use PDO;
use app\traits\Connection;

class Cardapio extends Base {
    use Connection;
    protected $table = 'produto';

    public function getAll() {
        $sql = "SELECT * FROM produto";
        $connection = $this->connection;
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT 
                    *
                FROM 
                    produto
                WHERE 
                    idrestaurante = :idrestaurante;
                ";
    
        $connection = $this->connection;
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':idrestaurante', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPrincipais() {
        $sql = "SELECT * FROM produto ORDER BY nome ASC LIMIT 8";
        $connection = $this->connection;
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}