<?php

    namespace App\Db;

    use \PDO;
    use \PDOException;

    class Database{
        const HOST = '127.0.0.1:3306';
        const NAME = 'cattus';
        const USER = 'root';
        const PASS = '';

        private $table;

        //instancia de conexao com o bd
        private $connection;

        public function __construct($table = null){
            $this->table = $table;
            $this->setConnection();
        }


        //Metodo que cria conexao com banco de dados
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                //nunca expor um erro de bd para o usuario final, esta aqui para fins academicos
                die("Erro: ".$e->getMessage());
            }
        }


        //metodo que vai executar as querys no banco
        public function execute($query, $params = []){
            try{

                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;

            }catch(PDOException $e){
                //nunca expor um erro de bd para o usuario final, esta aqui para fins academicos
                die("Erro: ".$e->getMessage());
            }
        }

        //metodo que ira inserir os dados no banco
        public function insert($values){
            //dados da query
            $fields = array_keys($values);
            $bind = array_pad([],count($fields),'?');

            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') values ('.implode(',',$bind).')';

            $this->execute($query, array_values($values));

            return $this->connection->lastInsertId();

        }

        //metodo para executar consulta no banco
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //dados da query
            $where = !empty($where) ? 'WHERE '.$where : '';
            $order = !empty($order) ? 'ORDER BY '.$order : '';
            $limit = !empty($limit) ? 'LIMIT '.$limit : '';

            //a query
            $query = ' SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
            //echo "<pre>"; print_r($query); echo "</pre>";

            //executa a query (chamando o metodo execute() utilizando o $this)
            return $this->execute($query);
        }

        //recebe os dados para atualizacao no array como campo=>valor
        public function update($where, $values){
            $fields = array_keys($values);

            $query = 'UPDATE '.$this->table.' set '.implode('=?, ', $fields).'=? where '.$where;
            //echo "<pre>"; print_r($query); echo "</pre>";
            //echo "<pre>"; print_r($values); echo "</pre>";
            
            $this->execute($query, array_values($values));

            return true;
        }

        //metodo para excluir dados do banco
        public function delete($where){
            $query = 'DELETE from '.$this->table.' where '.$where;
            $this->execute($query);

            return true;
        }
    }

?>