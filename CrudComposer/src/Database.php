<?php

namespace App;

use mysqli;
use Exception;
use Dotenv\Dotenv;

class Database {
    private $host;
    private $user;
    private $pass;
    private $name;
    public $conn;

    public function __construct() {
        // Carregar variáveis de ambiente
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        // Obter credenciais do banco de dados do arquivo .env
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->name = $_ENV['DB_NAME'];

        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }
}
