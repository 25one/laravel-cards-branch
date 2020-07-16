<?php
namespace App\Http\Controllers\Traits;

trait MyTrait
{
    protected $action;

    public function __construct($action) {
        $this->action = $action;
    }
    
    public function myMethod() {
        return "Laravel - " . $this->action;
    }
}