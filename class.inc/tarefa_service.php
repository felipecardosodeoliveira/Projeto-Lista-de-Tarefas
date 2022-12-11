<?php


class TarefaService {

    private $conn;
    private $tarefa;

    public function __construct(Conexao $conn, Tarefa $tarefa)
    {
        $this->conn   = $conn->conectar();
        $this->tarefa = $tarefa;

    }

    public function inserir() {
        $query = 'INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)';
        $stmt  = $this->conn->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();

    }

    public function recuperar() {
        $query = 'SELECT
                        t.id, s.status, t.tarefa
                            FROM tb_tarefas AS t
                                LEFT JOIN tb_status AS s ON (t.id_status = s.id)';
        $stmt  = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }

    public function atualizar() {
        $query = 'UPDATE tb_tarefas  SET tarefa=:tarefa WHERE id=:id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();

    }

    public function remover() {

        

    }

}