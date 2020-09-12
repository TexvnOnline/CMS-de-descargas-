<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'imagepublicidad','urlpublicidad',
    ];
}
