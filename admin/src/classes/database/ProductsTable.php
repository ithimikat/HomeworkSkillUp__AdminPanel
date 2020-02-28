<?php

namespace App\Admin\Database;

class ProductsTable
{
    private $tableName = 'products';
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Выборка всех продуктов из таблицы
     * @return array
     */
    public function getAllProducts(): array
    {
        $query = "SELECT `id`, `title`,`description`,`price`,`image` FROM `$this->tableName`";

        try{
            $res = $this->pdo->query($query)->fetchAll();
        }catch (\PDOException $ex){
            exit($ex->getMessage());
        }

        return $res;
    }

    /**
     * Удалени одной записи из таблицы
     * @param int $id
     * @return bool
     */
    public function deleteProduct(int $id): bool
    {
        $query = "DELETE FROM `$this->tableName` WHERE `id` = $id";
        return $this->pdo->exec($query);
    }

    /**
     * Вставка одной записи в таблицу
     * @param string $title
     * @param string $description
     * @param float $price
     * @param string $imageUrl
     * @return bool
     */
    public function addProduct(string $title, string $description, float $price, string $imageUrl): bool
    {
        $data = $this->validateData([$title, $description]);

        [$title, $description] = $data;

        $query = "INSERT INTO `$this->tableName`(`title`,`description`,`price`,`image`) VALUES(?,?,?,?)";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(1, $title, \PDO::PARAM_STR);
        $stmt->bindParam(2, $description, \PDO::PARAM_STR);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $imageUrl, \PDO::PARAM_STR);

        return $stmt->execute();
    }

    /**
     * Обработка входящих данных на html теги и специальные символы
     * @param array $parameters
     * @return array
     */
    private function validateData(array $parameters): array
    {
        foreach ($parameters as $key => $value){
            $value = strip_tags($value);
            $parameters[$key] = htmlspecialchars($value);
        }

        return $parameters;
    }
}