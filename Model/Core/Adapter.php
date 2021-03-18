<?php

namespace Model\Core;

class Adapter {

    
    private $connect = NULL;
    public $config = [
        'host' => 'localhost',
        'dbusername' => 'root',
        'dbpassword' => '',
        'dbname' => 'php_app'
    ];


    public function connection() {
        $connect = mysqli_connect($this->config['host'], $this->config['dbusername'], $this->config['dbpassword'], $this->config['dbname'], );    
        $this->setConnect($connect);
    }

    public function setConnect(\mysqli $connect) {
        $this->connect = $connect;
        return $this;
    }

    public function getConnect() {
        return $this->connect;
    }

    public function isConnected() {
        if(!$this->getConnect()) {
            return false;
        }
        return true;
    }
    
    public function insert($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }
       
       $result = $this->getconnect()->query($query);
       if(!$result) {
           return false;
       }
       return $this->getConnect()->insert_id;
    }

    public function update($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }
       
       $result = $this->getconnect()->query($query);
       if(!$result) {
           return false;
       }
       return true;
    }

    public function delete($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }
       
       $result = $this->getconnect()->query($query);
       if(!$result) {
           return false;
       }
       return true;
    }
    
    public function fetchAll($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        if(!$result) {
            return false;
        }
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if(!$rows) {
            return false;
        }
        return $rows;

    }

    public function fetchRow($query) {
        if(!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $row = $result->fetch_assoc();
        if(!$row) {
            return false;
        }
        return $row;
    }

    public function fetchPairs($query)
    {
        if(!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all();
        if(!$rows) {
            return false;
        }
        
        $column = array_column($rows, '0');
        $values = array_column($rows, '1');
        return array_combine($column, $values);
    }



}






?>