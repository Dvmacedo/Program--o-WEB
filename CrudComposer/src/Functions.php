<?php

namespace App;

class Functions {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db->conn;
    }

    public function getAll($table) {
        $sql = "SELECT * FROM $table";
        return $this->db->query($sql);
    }

    public function getById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = $id";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        return $this->db->query($sql);
    }

    public function update($table, $id, $data) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE $table SET $set WHERE id = $id";
        return $this->db->query($sql);
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->db->query($sql);
    }
}