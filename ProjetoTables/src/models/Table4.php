<?php
class Table4 {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insert($data) {
        $column1 = $data['column1'];
        $column2 = $data['column2'];
        $column3 = $data['column3'];

        $sql = "INSERT INTO table1 (column1, column2, column3) VALUES ('$column1', '$column2', '$column3')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New record created successfully in Table1";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}