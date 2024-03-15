<?php
/**
 *  This is the DATABASE CONNECTION for my Portfolio database connection using PDO
 *  @authors Braedon Billingsley
 *  @copyright 2024
 *  @url https://bbillingsley.greenriverdev.com/portfolio
 */
require_once($_SERVER['DOCUMENT_ROOT'] .'/../portfolio-db-config.php');
class DatabaseConnection
{
    private static ?PDO $dbh = null;
    private function __construct() {}

    /**
     *  Get the database connection.
     *  This method establishes a connection to the database using PDO.
     *  @return PDO The PDO object representing the database connection.
     *  @throws PDOException Throws a PDOException if there is an error connecting to the database.
     */
    public static function getConnection(): PDO
    {
        if (is_null(self::$dbh))
        {
            try
            {
                /* @noinspection PhpUndefinedConstantInspection */
                self::$dbh = new PDO(dsn: DB_DSN, username: DB_USERNAME, password: DB_PASSWORD);
            }

            catch (PDOException $e)
            {
                echo "Database connection error: " . $e->getMessage();
                throw $e;
            }
        }

        return self::$dbh;
    }
}
