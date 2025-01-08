<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formations';
    protected $fillable = ['id','id_per_training_mananger','id_level','date_beginning','date_ending', 'nom'];

    public $timestamps = false;

}


