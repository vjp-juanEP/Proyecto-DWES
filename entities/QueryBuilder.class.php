<?php
require_once 'exceptions/QueryException.class.php';
require_once 'utils/string.php';
require_once 'App.class.php';
require_once 'categoria.class.php';

abstract class QueryBuilder
{
        /**
         * @var PDO
         */
        private $connection;

        /**
         * @var string
         */
        private $table;

        /**
         * @var string
         */
        private $classEntity;

        public function __construct(string $table, string $classEntity)
        {
            $this->connection = App::getConnection();
            $this->table = $table;
            $this->classEntity = $classEntity;
        }

        public function findAll() : array{
            $sqlStatement = "Select * from $this->table";

            $pdoStatement = $this -> connection->prepare($sqlStatement);

            if($pdoStatement->execute() === false){
                throw new QueryException(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]);
            }

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$this->classEntity);
        }

        public function save(IEntity $entity):void {
            try{
                $parameters = $entity->toArray();

                // [imagen: foto, descripcion: hola bro, categoria: 1]
                foreach ($parameters as $key => $value) {
                    echo "Clave: $key, Valor: $value\n";
                }

                // insert into imagenbes (descripcion, categoria) values (bytes, 1)
                $sql = sprintf('insert into %s (%s) values (%s)', 
                                $this->table, 
                                implode(', ', array_keys($parameters)),
                                ':' . implode(',:' , array_keys($parameters)));


                $statement = $this->connection->prepare($sql);
                $statement -> execute($parameters);
            }catch(PDOException $exception){
                // throw new QueryException(ERROR_STRINGS[ERROR_INSERT_BD]);
                die($exception->getMessage());
            }
            
        }


        // public function save(IEntity $entity): void{
        //     try{
        //     $parameters =$entity->toArray();
    
        //     $sql = sprintf('insert into %s (%s) values(%s)',
        //     $this->table,
        //     implode(', ',array_keys($parameters)),
        //     ':'.implode(',:',array_keys($parameters)) // :id, :nombre, :descripcion
        //     );
            
        //         $statement =$this->connection->prepare($sql);
        //         $statement->execute($parameters);
        //         if($entity instanceof imagenGaleria){
        //             $this->incrementarNumCategorias($entity->getCategoria());
        //         }
        
        
        //     }catch(PDOException $exception){
        //         die ($exception->getMessage());
        //         //throw new  QueryException(getErrorString($exception));
        
        //     }
        // }

        public function executeTransaction(callable $fnExecuteQueries){
            try{
                $this->connection->beginTransaction();
                $fnExecuteQueries();

                $this->connection->commit();
            }catch(PDOException $pdoException)
            {
                throw new PDOException($pdoException->getMessage());
            }
        }
    }
?>