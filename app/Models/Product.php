<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //Ekta product er sokol image fetch kore nia ase
    //Parent table Product theke child table MultipleImage er relationship hbe hasMany()
    public function multiple_images(){
        return $this->hasMany(MultipleImage::class);
    }
}