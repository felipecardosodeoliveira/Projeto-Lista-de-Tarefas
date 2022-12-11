<?php


class Conexao {

    private $host = 'localhost';
    private $dbname = 'lista_tarefas_pdo';
    private $user = 'root';
    private $pass = 'root';

    public function conectar() {

        try {

            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                "{$this->user}",
                "{$this->pass}"
            );

            return $conn;

        } catch (PDOException $e) {

            echo $e->getMessage();
        
        }

    }

}
