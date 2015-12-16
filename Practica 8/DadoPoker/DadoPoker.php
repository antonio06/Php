<?php

class DadoPoker {
    private $figura = "";
    private static $figura = ["As", "K", "Q", "J", "7", "8"];
    
    public function __construct($figura) {
        $this->figura = $figura;
    }
    
    public function tirar(){
        $this->figura = DadoPoker::$figura[rand(0, 5)];
    }
}

