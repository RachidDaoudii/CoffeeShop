<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plats extends Model
{
    use HasFactory;

    protected $fillable =[
        'img',
        'name',
        'description',
        'price',
        'id_category'
    ];
}
