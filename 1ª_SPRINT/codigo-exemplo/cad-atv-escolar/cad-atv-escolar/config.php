<?php

define('usuario', 'root');
define('senha', 'Sharon12&');
define('host', 'localhost');
define('porta', '3306');
define('bd', 'atvesc');
define('dsn', 'mysql:host=' . host . ';port=' . porta . ';dbname=' . bd);

/*try {
    $conexao = new PDO(dsn, usuario, senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die('Falha na conexão: ' . $e->getMessage());
}*/

?>