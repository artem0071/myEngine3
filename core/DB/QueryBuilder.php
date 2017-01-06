<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($table, $select = '*', $where = '', $order = '',$limit ='')
    {
        $statement = $this->pdo->prepare("select {$select} from {$table} {$where} {$order} {$limit}");
        $statement -> execute();
        return json_decode(json_encode($statement->fetchAll(PDO::FETCH_CLASS)),true);

    }

    public function insert($table, $param){

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($param)),
            ':' . implode(', :', array_keys($param))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($param);
        } catch (Exception $e) {
        }
    }

    public function update($table, $params, $where = ''){

        $sql = "update {$table} set {$params} {$where}";
        $statement = $this->pdo->prepare($sql);
        $statement -> execute();

    }

    public function delete($table, $where)
    {
        $sql = "delete from {$table} where {$where}";
        $statement = $this->pdo->prepare($sql);
        $statement -> execute();
    }
}