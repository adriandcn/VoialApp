<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visitorQuery extends Model
{
    protected $table = 'visitorquery';
    public $timestamps = false;
    protected $fillable = array('ip', 'query', 'usuario', 'provincia', 'canton', 'fecha'); 
    protected $hidden = ['ip'];
}
