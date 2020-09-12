<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'slug','title', 'name','cover',
    ];
    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
