<?php
declare(strict_types=1);

class Database
{
    public $pdo;

    /**
     * Database constructor.
     * @param array $config is an array with data that is necessary to connect database
     */
    public function __construct(array $config)
    {
        $dsn = "mysql:dbname=%s;host=%s";
        $dsn = sprintf($dsn, $config['dbname'], $config['host']);

        try {
            $this->pdo = new PDO(
                $dsn,
                $config['user'],
                $config['password']
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            $renderer = new Renderer();
            $renderer->render('Main', 'Maintenance');
            echo 'Błąd połączenia z bazą danych';
            die;
        }
    }
}