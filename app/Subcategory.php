<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_id','slug','title', 'name','cover',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
