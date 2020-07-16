<?php
namespace App\Myclass;

class MyClass
{
    private $action;

    public function __construct($action) {
        $this->action = $action;
    }
    
    public function myMethod() {
        return "Laravel - " . $this->action;
    }
}