<?php

defined('ROOTPATH') OR exit('Access Denied!');

trait Database
{
    private function connect()
    {
        $string = "mysql:hostname=" . DB_HOST . ";dbname=" . DB_NAME;
        try {
            $conn = new PDO($string, DB_USER, DB_PSW);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }

    public function query($query, $data = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function get_row($query, $data = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }
}
