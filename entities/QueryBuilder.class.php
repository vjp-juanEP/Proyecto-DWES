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

    public function findAll(): array
    {
        $sqlStatement = "Select * from $this->table";

        //Prepara la consulta SQL para su ejecución.
        $pdoStatement = $this->connection->prepare($sqlStatement);
        
        //Si no se ejecuta la consulta SQL que fue preparada con prepare()
        if ($pdoStatement->execute() === false) {
            throw new QueryException(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]);
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();

            // insert into imagenbes (descripcion, categoria) values (bytes, 1)
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(',:', array_keys($parameters))
            );
            //Prepara la consulta SQL para su ejecución.
            $statement = $this->connection->prepare($sql);
            //Ejecuta la consulta SQL que fue preparada con prepare()
            $statement->execute($parameters);

        } catch (PDOException $exception) {
            throw new QueryException(ERROR_STRINGS[ERROR_INSERT_BD]);
            //die($exception->getMessage());
        }
    }

    public function executeTransaction(callable $fnExecuteQueries)
    {
        try {
            $this->connection->beginTransaction();

            $fnExecuteQueries();
            //Confirma una transacción y aplica de forma permanente todos los cambios realizados en la base de datos durante esa transacción.
            $this->connection->commit();
        } catch (PDOException $pdoException) {
            //Revierte todos los cambios realizados en la base de datos durante una transacción desde el momento en que se inició con beginTransaction
            $this->connection->rollBack();
            throw new PDOException($pdoException->getMessage());
        }
    }

    public function incrementaNumeroImagenesCategoria(int $idCategoria)
    {
        try {
            $sql = "UPDATE categorias SET numImagenes = numImagenes + 1 WHERE id = $idCategoria";
            //Prepara la consulta SQL para su ejecución.
            $statement = $this->connection->prepare($sql);
            //Ejecuta la consulta SQL que fue preparada con prepare()
            $statement->execute();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
