<?php

class Database{
    private static $conn;

    public static function conectar()
    { //estatic dá para usar esse método que está nessa classe sem precisar instanciar a classe
        if (!self::$conn) { //se eu não estiver estanciando o método conn:
            self::$conn  = new PDO( //eu mesma vou instaciar
                "pgsql:host=192.168.10.65;port=5432;dbname=cliente_crud",
                "cliente_crud",
                "cliente_crud",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] //ATTR_ERRMODE é um método do poo que não precisa ter a classe instanciada
            );
        }
        return self::$conn;
    }
}

?>
