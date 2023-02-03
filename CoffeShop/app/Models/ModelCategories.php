<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelCategories extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_user',
        'name_category'
    ];
}
