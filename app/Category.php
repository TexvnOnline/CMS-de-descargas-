<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'slug','title', 'name','visits', 'cover',
    ];
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
}
