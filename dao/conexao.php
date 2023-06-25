<?php

namespace dao;

use PDO;

class Conexao {
    private static $dbNome = 'loja'; 
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root'; 
    private static $dbSenha = '';  

    private static $cont = null; 

    public function __construct() {
        die("A função init não é permitida"); 
    }

    public static function conectar() {
        if (self::$cont == null) {
            try {
                self::$cont = new PDO("mysql:host=". self::$dbHost .";dbname=" . self::$dbNome , self::$dbUsuario, self::$dbSenha);
            } catch (\PDOException $ex) {
                die ($ex->getMessage());
            }
 
        }
        return self::$cont; 
    }

    public static function desconectar() {
        self::$cont = null; 
    }

}
?>