<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //Fetch a category under a subcategory
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Fetch a category under a subcategory
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
}