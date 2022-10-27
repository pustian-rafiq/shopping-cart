<?php

namespace App\Crud;

// use App\Crud\Interface\CrudInterface;
use App\Crud\Interfaces\CrudInterface;
use App\Crud\Operation\Insert;
use Exception;

class Crud implements CrudInterface
{
    public function __construct($model)
    {
        $this->model = $model;
        $this->action = [
            "insert" => new Insert(),
        ];
    }
    
    public function action($action, $data)
    {
        if(array_key_exists($action, $this->action)){
            return $this->action[$action]->run($this->model, $data);
        }

        throw new Exception("Operation not found");
    }
}