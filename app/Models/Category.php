<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //Fetch all sub categories under a category
    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }
}