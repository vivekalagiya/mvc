<?php
namespace Model\Core;

class Request{

    public function isPost() {
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return false;
        }
        return true;
    }

    public function getPost($key = Null, $optional = Null) {
        if(!$key) {
            return $_POST;
        }
        if(!array_key_exists($key, $_POST)) {
            return $optional;
        }
        return $_POST[$key];
    }

    public function getGet($key = Null, $optional = Null) {
        if(!$key) {
            return $_GET;
        }
        if(!array_key_exists($key, $_GET)) {
            return $optional;
        }
        return $_GET[$key];
    }

    public function getControllerName() {
        return $_GET['c'];
    }

    public function getActionName() {
        return $_GET['a'];
    }



}



?>