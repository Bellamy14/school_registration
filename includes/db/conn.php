<?php
//development connection (local)
    //$host = '127.0.0.1';
    //$db =   'pta_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    //remote database connection
    $host = 'sql.freedb.tech';
    $db =   'freedb_Php_Test';
    $user = 'freedb_Anniecia_Bell';
    $pass = 'uM#AUF8JCcWxYWQ';
    $charset = 'utf8mb4';


    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{

        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {

            //echo "<h1 class='text-danger'>No datbase found</h1>";
            throw new PDOException($e->getMessage());



            }

            require_once 'crud.php';
            require_once 'user.php';
            $crud = new crud($pdo);
            $user = new user($pdo);

            $user->insertUser("admin","@dministrat0r");
?>