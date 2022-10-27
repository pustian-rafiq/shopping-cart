<?php

namespace App\Crud\Operation;

final class Insert
{
    public function run($model, $data)
    {
        return $model::create($data);
    }
}