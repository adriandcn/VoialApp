<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tendencia extends Model
{
    protected $table = 'tendencias';
    public $timestamps = false;
    protected $primaryKey = 'idtendencias';
    protected $fillable = ['idtendencias', 'nombre', 'descripcion', 'hashtag' ,'status'] ; 
    protected $hidden = ['status'];
}