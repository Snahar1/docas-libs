<?php
namespace IcoaraciDB;

use Exception;

class Icoaraci {
    private static $driverInstance = null;
    protected $table;
    protected $where = [];
    protected $params = [];

    /**
     * Configura o Driver (MySQL, Mongo, etc)
     */
    public static function setDriver(string $type, array $config) {
        $driverClass = "IcoaraciDB\\Drivers\\" . ucfirst(strtolower($type)) . "Driver";

        if (!class_exists($driverClass)) {
            throw new Exception("Driver [{$type}] nao encontrado em IcoaraciDB\\Drivers.");
        }

        self::$driverInstance = new $driverClass();
        self::$driverInstance->connect($config);

        return new self(); // Retorna uma instância para o Query Builder
    }

    /**
     * Define a tabela para a consulta
     */
    public function table(string $table) {
        $this->table = $table;
        $this->where = []; // Limpa filtros anteriores
        $this->params = [];
        return $this;
    }

    /**
     * Adiciona filtros WHERE (Ex: ->where('id', 10))
     */
    public function where(string $column, $value, $operator = '=') {
        $this->where[] = "{$column} {$operator} ?";
        $this->params[] = $value;
        return $this;
    }

    /**
     * Finaliza a consulta e retorna os dados (O Superpoder)
     */
    public function get() {
        if (!self::$driverInstance) {
            throw new Exception("IcoaraciDB: Driver nao configurado.");
        }

        $sql = "SELECT * FROM {$this->table}";
        
        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->where);
        }

        // Delega a execução para o Driver ativo
        return self::$driverInstance->query($sql, $this->params);
    }

    /**
     * Atalho para obter a instância do driver diretamente
     */
    public static function getInstance() {
        return self::$driverInstance;
    }
}
