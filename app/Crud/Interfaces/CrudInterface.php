<?php
namespace App\Crud\Interfaces;

interface CrudInterface{
    public function action($action, $data);
}