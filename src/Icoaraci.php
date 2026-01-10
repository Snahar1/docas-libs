<?php
namespace IcoaraciDB;

use Exception;

class Icoaraci {
    private static $driverInstance = null;

    /**
     * O Superpoder: Define qual banco usar dinamicamente
     */
    public static function setDriver(string $type, array $config) {
        // Transforma o nome (ex: mysql) no caminho da classe (ex: Drivers\MySqlDriver)
        $driverClass = "IcoaraciDB\\Drivers\\" . ucfirst(strtolower($type)) . "Driver";

        if (!class_exists($driverClass)) {
            throw new Exception("O Driver para o banco [{$type}] nao foi instalado ou nao existe.");
        }

        // Instancia o driver e faz a conexão
        self::$driverInstance = new $driverClass();
        self::$driverInstance->connect($config);

        return self::$driverInstance;
    }

    /**
     * Atalho para obter a instância ativa em qualquer parte do sistema
     */
    public static function getInstance() {
        if (self::$driverInstance === null) {
            throw new Exception("IcoaraciDB: Nenhum driver foi configurado ainda.");
        }
        return self::$driverInstance;
    }
}
