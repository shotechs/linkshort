<?php

class config
{
    public static function connect()
    {
        $host= "127.0.0.1";
        $dbname= "urls";
        $username='root';
        $password='';

        //echo PDO:
        try {
            $handler = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "<br>" ;
            die("Sorry, database problem");
        }

        return $handler;
    }

    // Error connecting to database
    public static function checkSuccess($success)
    {
        if ($success == false) {
            //TODO: custom error page.
            echo "Error connecting to database with this query.";
            die();
        } else {
            return true;
        }
    }
}
